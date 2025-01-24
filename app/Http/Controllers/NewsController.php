<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    // Menampilkan semua berita dengan filter
    public function index(Request $request)
    {
        $query = News::query();

        // Pencarian berdasarkan judul
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Filter berdasarkan unit
        if ($request->filled('unit')) {
            $query->where('unit', $request->unit);
        }

        // Filter berdasarkan kategori
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $news = $query->get();
        return view('admin.news.index', compact('news'));
    }
    // Show the form for editing the specified news item
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

  public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'nullable|image|max:2048',
        'unit' => 'required|string',
        'category' => 'required|string',
    ]);

    try {
        $news = News::findOrFail($id);
        $news->title = $request->title;
        $news->content = $request->content;
        $news->unit = $request->unit;
        $news->category = $request->category;
        $news->trending = $request->has('trending');

        // Handle image upload
        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::delete('public/' . $news->image);
            }
            $path = $request->file('image')->store('news_images', 'public');
            $news->image = $path;
        }

        $news->save();

        return response()->json(['success' => 'Berita berhasil diperbarui!']);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Terjadi kesalahan saat memperbarui berita.'], 500);
    }
}

    // Menyimpan berita baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'unit' => 'required',
            'category' => 'required',
            'image' => 'nullable|image|max:10000', // Image is optional
        ]);

        $data = $request->only(['title', 'content', 'unit', 'category']);
        $data['user_id'] = auth()->id();  // Set the user_id to the logged-in user

        // Convert checkbox value to integer (1 if checked, 0 if unchecked)
        $data['trending'] = $request->has('trending') ? 1 : 0;

        // Check if an image file is uploaded before storing it
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news_images', 'public');
        }

        News::create($data);

        return response()->json(['success' => 'News item created successfully!']);
    }

    // Fungsi untuk validasi request
    private function validateRequest($request)
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'unit' => 'required|in:TK,SD,SMP,Utama',
            'category' => 'required|in:program,extracurricular,activity,achievement',
            'trending' => 'nullable|boolean',
        ]);
    }

 // app/Http/Controllers/NewsController.php

public function destroy($id)
{
    try {
        $news = News::find($id);

        // Cek apakah berita ditemukan
        if (!$news) {
            return redirect()->route('news.index')->with('error', 'Berita tidak ditemukan.');
        }

        // Hapus gambar jika ada
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        // Hapus berita
        $news->delete();

        // Kembalikan response JSON jika permintaan adalah AJAX
        if (request()->ajax()) {
            return response()->json(['success' => 'News deleted successfully!']);
        }

        // Redirect jika permintaan berasal dari UI
        return redirect()->route('news.index')->with('success', 'Berita berhasil dihapus.');
    } catch (\Exception $e) {
        \Log::error('Kesalahan saat menghapus berita: ' . $e->getMessage());

        // Kembalikan response JSON untuk AJAX
        if (request()->ajax()) {
            return response()->json(['error' => 'Terjadi kesalahan saat menghapus berita!'], 500);
        }

        // Redirect untuk UI
        return redirect()->route('news.index')->with('error', 'Terjadi kesalahan saat menghapus berita.');
    }
}


    // Fungsi untuk upload gambar
    private function uploadImage($request)
    {
        return $request->file('image')->store('news_images', 'public');
    }
    
    public function showTrendingNews(Request $request) {
         // Hitung total pengunjung
        $totalVisitors = DB::table('visitors')->count();

        // Hitung pengunjung online (aktif dalam 5 menit terakhir)
        $onlineVisitors = DB::table('visitors')
            ->where('last_active', '>=', now()->subMinutes(5)) // Pengunjung aktif dalam 5 menit terakhir
            ->count();

      
        // Ambil berita yang trending
        $trendingNews = News::where('trending', true)
        ->whereIn('unit', ['TK','SD', 'SMP','Utama'])
        ->whereIn('category', ['program', 'extracurricular', 'activity', 'achievement'])
        ->with('user')
        ->get();
        
        
        // Mengambil program terkait
        $programs = News::where('category', 'program')->get();
        $ekskul = News::where('category', 'extracurricular')->get();
        $prestasi = News::where('category', 'achievement')->get();
        $kegiatan = News::where('category', 'activity')->get();
    
        return view('visitors.home', compact('trendingNews', 'programs', 'ekskul', 'prestasi', 'kegiatan','totalVisitors','onlineVisitors'));
    }
    
    public function show($id)
{
    $news = News::with('user')->findOrFail($id);
    $otherNews = News::where('id', '!=', $id)->latest()->take(5)->get(); // Mengambil 5 berita terbaru, kecuali yang saat ini
    return view('visitors.news.view', compact('news', 'otherNews'));
}


    public function news_articles(){
            $newsArticles = News::latest()->take(10)->get(); // Misalnya mengambil 10 artikel terbaru
            return view('visitors.berita', compact('newsArticles'));
    }

    public function category($category)
    {
        // Ambil semua berita berdasarkan kategori
        $news = News::where('category', $category)->get();

        // Pastikan kategori valid sebelum mengirim ke view
        if ($news->isEmpty()) {
            return redirect()->back()->with('error', 'Kategori tidak ditemukan atau tidak memiliki berita.');
        }

        // Kembalikan view dengan data berita
        return view('visitors.news.category', compact('news', 'category'));
    }
    
    public function newslatest()
    {
        // Ambil berita terbaru, misalnya yang terakhir ditambahkan
        $latestNews = News::orderBy('created_at', 'desc')->take(6)->get();

        return view('visitors.home', compact('latestNews'));
    }
    


}