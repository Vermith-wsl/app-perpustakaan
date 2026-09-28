<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private array $categories = [
        ['id' => 1, 'nama_kategori' => 'Fiksi'],
        ['id' => 2, 'nama_kategori' => 'Teknologi'],
        ['id' => 3, 'nama_kategori' => 'Sejarah'],
    ];

    private array $books = [
        [
            'id' => 1,
            'judul' => 'Laskar Pelangi',
            'penulis' => 'Andrea Hirata',
            'penerbit' => 'Bentang Pustaka',
            'tahun_terbit' => 2005,
            'isbn' => '978-979-3062-79-2',
            'stok' => 5,
            'category_id' => 1,
            'kategori' => 'Fiksi',
        ],
        [
            'id' => 2,
            'judul' => 'Pemrograman Web dengan Laravel',
            'penulis' => 'Budi Raharjo',
            'penerbit' => 'Informatika',
            'tahun_terbit' => 2023,
            'isbn' => '978-602-8758-12-3',
            'stok' => 3,
            'category_id' => 2,
            'kategori' => 'Teknologi',
        ],
        [
            'id' => 3,
            'judul' => 'Sejarah Indonesia Modern 1200-2008',
            'penulis' => 'M.C. Ricklefs',
            'penerbit' => 'Serambi',
            'tahun_terbit' => 2008,
            'isbn' => null,
            'stok' => 2,
            'category_id' => 3,
            'kategori' => 'Sejarah',
        ],
    ];

    public function index()
    {
        $books = $this->books;

        return view('books.index', compact('books'));
    }

    public function create()
    {
        $categories = $this->categories;

        return view('books.create', compact('categories'));
    }

    public function store(StoreBookRequest $request)
    {
        $validated = $request->validated();

        return redirect()->route('books.index')
            ->with('success', "Buku \"{$validated['judul']}\" berhasil ditambahkan (data dummy, belum tersimpan ke DB).");
    }

    public function show(string $id)
    {
        $book = collect($this->books)->firstWhere('id', (int) $id);

        if (! $book) {
            abort(404);
        }

        return view('books.show', compact('book'));
    }

    public function edit(string $id)
    {
        $book = collect($this->books)->firstWhere('id', (int) $id);

        if (! $book) {
            abort(404);
        }

        $categories = $this->categories;

        return view('books.edit', compact('book', 'categories'));
    }

    public function update(StoreBookRequest $request, string $id)
    {
        $validated = $request->validated();

        return redirect()->route('books.index')
            ->with('success', "Buku ID {$id} (\"{$validated['judul']}\") berhasil diperbarui (data dummy, belum tersimpan ke DB).");
    }

    public function destroy(string $id)
    {
        return redirect()->route('books.index')
            ->with('success', "Buku ID {$id} berhasil dihapus (data dummy, belum tersimpan ke DB).");
    }
}