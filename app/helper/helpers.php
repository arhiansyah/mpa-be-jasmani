<?php
if (!function_exists('format_hari_tanggal')) {
    function format_hari_tanggal($waktu)
    {
        $hari_array = array(
            'Minggu',
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu'
        );
        $hr = date('w', strtotime($waktu));
        $hari = $hari_array[$hr];
        $tanggal = date('j', strtotime($waktu));
        $bulan_array = array(
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        );
        $bl = date('n', strtotime($waktu));
        $bulan = $bulan_array[$bl];
        $tahun = date('Y', strtotime($waktu));
        $jam = date( 'H:i:s', strtotime($waktu));
        
        //untuk menampilkan hari, tanggal bulan tahun jam
        //return "$hari, $tanggal $bulan $tahun $jam";
    
        //untuk menampilkan hari, tanggal bulan tahun
        return "$hari, $tanggal $bulan $tahun";
    }
}

if (!function_exists('format_uang')) {
    function format_uang($angka){ 
        $hasil =  number_format($angka,0, ',' , '.'); 
        return 'Rp. '.$hasil; 
    }
}

if (!function_exists('format_tanggal')) {
    function format_tanggal($date)
    {
        $dateCarbon = \Carbon\Carbon::parse($date);
        $formatted = $dateCarbon->isoFormat('dddd, D MMMM Y');
        return $formatted;
    }
}

if(!function_exists('is_email_verified')){
    function is_email_verified()
    {
        if (auth()->check()) {
            $emailVerified = auth()->user()->email_verified_at;
            if ($emailVerified == null || $emailVerified == '' ) {
                return true;
            }  
        }
        return false;
    }
}