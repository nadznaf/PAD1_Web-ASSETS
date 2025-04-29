<?php

namespace App\Http\Controllers;

use App\Models\Kabinet;
use Illuminate\Support\Facades\Http;

class ArtikelController extends Controller
{
    private function getFirstImageFromContent($content)
    {
        // Buat DOM Document
        $doc = new \DOMDocument();

        // Supaya nggak error karena HTML tidak lengkap
        libxml_use_internal_errors(true);

        // Load HTML dari string
        $doc->loadHTML($content);

        // Ambil semua tag img
        $tags = $doc->getElementsByTagName('img');

        // Kalau ada <img>, ambil src pertama
        if ($tags->length > 0) {
            return $tags->item(0)->getAttribute('src');
        }

        return null; // Kalau nggak ada gambar
    }


    private function getRssFeeds()
    {
        // Fetch RSS feed
        $response = Http::get('https://trpl.sv.ugm.ac.id/feed/');

        // Parse XML
        $xml = simplexml_load_string($response->body());

        // Ambil semua item
        $items = [];
        foreach ($xml->channel->item as $item) {
            $content = (string) $item->children('content', true)->encoded;
            $img = $this->getFirstImageFromContent($content);
            $items[] = [
                'title' => (string) $item->title,
                'link' => (string) $item->link,
                'description' => (string) $item->description,
                'pubDate' => (string) $item->pubDate,
                'img' => (string) $img,
                // kamu bisa tambahkan field lain sesuai kebutuhan
            ];
        }

        return $items;
    }
    public function index()
    {
        $dataKabinet = Kabinet::orderBy('tahun_awal_kabinet', 'desc')->get();
        $dataArtikel = $this->getRssFeeds();
        return view('user.artikel', compact('dataKabinet', 'dataArtikel'));
    }
}
