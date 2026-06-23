<?php

namespace App\Controllers;

class Page extends BaseController
{
    /**
     * Menampilkan profil website ArChi Gaming Station
     */
    public function about()
    {
        $data = [
            'title'   => 'Tentang ArChi Cozy Gaming Portal',
            'content' => 'ArChi Cozy Gaming Portal adalah platform informasi digital dan komunitas khusus buat kamu para gamer sejati. Kami mendedikasikan ruang ini untuk menyajikan review mendalam, pembaruan meta game paling panas, hingga kisah-kisah esports epik dari game dengan tensi tinggi seperti Valorant, PUBG Mobile, hingga arena brawler intens di Roblox Violence District. ArChi berkomitmen menjadi panduan taktis terbaik untuk mengasah aim, menyusun strategi rotasi, dan meningkatkan mekanik kombo kamu!'
        ];

        return view('about', $data);
    }

    /**
     * Menampilkan informasi kontak ArChi
     */
    public function contact()
    {
        $data = [
            'title'   => 'Hubungi Tim ArChi',
            'content' => 'Punya rekomendasi game keras buat di-review, strategi turnamen yang mau dibagikan, atau tertarik untuk kolaborasi bareng komunitas ArChi Gaming? Kami selalu terbuka untuk mendengar masukan dan tantangan baru dari kamu. Hubungi tim redaksi dan admin kami melalui saluran resmi di bawah ini!'
        ];

        return view('contact', $data);
    }

    /**
     * Menampilkan pertanyaan seputar portal ArChi
     */
    public function faqs()
    {
        $data = [
            'title'   => 'ArChi Frequently Asked Questions (FAQ)',
            'content' => 'Temukan jawaban instan seputar penggunaan portal game ArChi, cara mengirimkan tips taktis squad kamu, berkontribusi dalam penulisan reviews, hingga aturan mabar (main bareng) yang sehat di komunitas kami.'
        ];

        return view('faqs', $data);
    }
}