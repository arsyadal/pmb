<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- DaisyUI CDN -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@1.14.0/dist/full.css" rel="stylesheet">
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-center">Edit User</h2>
            
            <!-- Success Alert -->
            @if(Session::has('success'))
                <div class="alert alert-success">
                    <div class="flex-1">
                        <label>{{ Session::get('success') }}</label>
                    </div>
                </div>
            @endif

            <!-- Error Alert -->
            @if($errors->any())
                <div class="alert alert-error">
                    <div class="flex-1">
                        <label>{{ $errors->first() }}</label>
                    </div>
                </div>
            @endif

            <form action="{{ route('admin.update', $user->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div class="form-control">
                    <label class="label" for="name">
                        <span class="label-text">Name</span>
                    </label>
                    <input type="text" id="name" name="name" class="input input-bordered w-full" value="{{ old('name', $user->name) }}" required>
                </div>
                <div class="form-control">
                    <label class="label" for="email">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="email" id="email" name="email" class="input input-bordered w-full" value="{{ old('email', $user->email) }}" required>
                </div>
          
                <div class="form-control">
                    <label class="label" for="alamat_ktp">
                        <span class="label-text">Alamat KTP</span>
                    </label>
                    <input type="text" id="alamat_ktp" name="alamat_ktp" class="input input-bordered w-full" value="{{ old('alamat_ktp', $user->alamat_ktp) }}">
                </div>
                <div class="form-control">
                    <label class="label" for="alamat_saat_ini">
                        <span class="label-text">Alamat Saat Ini</span>
                    </label>
                    <input type="text" id="alamat_saat_ini" name="alamat_saat_ini" class="input input-bordered w-full" value="{{ old('alamat_saat_ini', $user->alamat_saat_ini) }}">
                </div>
                <div class="form-control">
                    <label class="label" for="provinsi">
                        <span class="label-text">Provinsi</span>
                    </label>
                    <select id="provinsi" name="provinsi" class="select select-bordered w-full">
                        <option value="">{{ __('Pilih Provinsi') }}</option>
                    </select>
                </div>
                <div class="form-control">
                    <label class="label" for="kabupaten">
                        <span class="label-text">Kabupaten</span>
                    </label>
                    <select id="kabupaten" name="kabupaten" class="select select-bordered w-full">
                        <option value="">{{ __('Pilih Kabupaten') }}</option>
                    </select>
                </div>
       
                <div class="form-control">
                    <label class="label" for="nomor_telepon">
                        <span class="label-text">Nomor Telepon</span>
                    </label>
                    <input type="text" id="nomor_telepon" name="nomor_telepon" class="input input-bordered w-full" value="{{ old('nomor_telepon', $user->nomor_telepon) }}">
                </div>
                <div class="form-control">
                    <label class="label" for="nomor_hp">
                        <span class="label-text">Nomor HP</span>
                    </label>
                    <input type="text" id="nomor_hp" name="nomor_hp" class="input input-bordered w-full" value="{{ old('nomor_hp', $user->nomor_hp) }}">
                </div>
                <div class="form-control">
                    <label class="label" for="kewarganegaraan">
                        <span class="label-text">Kewarganegaraan</span>
                    </label>
                    <select id="kewarganegaraan" name="kewarganegaraan" class="select select-bordered w-full">
                        <option value="WNI Asli" {{ $user->kewarganegaraan == 'WNI Asli' ? 'selected' : '' }}>WNI Asli</option>
                        <option value="WNI Keturunan" {{ $user->kewarganegaraan == 'WNI Keturunan' ? 'selected' : '' }}>WNI Keturunan</option>
                        <option value="WNA" {{ $user->kewarganegaraan == 'WNA' ? 'selected' : '' }}>WNA</option>
                    </select>
                </div>
                <div class="form-control">
                    <label class="label" for="tanggal_lahir">
                        <span class="label-text">Tanggal Lahir</span>
                    </label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="input input-bordered w-full" value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}">
                </div>
                <div class="form-control">
                    <label class="label" for="tempat_lahir">
                        <span class="label-text">Tempat Lahir</span>
                    </label>
                    <input type="text" id="tempat_lahir" name="tempat_lahir" class="input input-bordered w-full" value="{{ old('tempat_lahir', $user->tempat_lahir) }}">
                </div>
                <div class="form-control">
                    <label class="label" for="jenis_kelamin">
                        <span class="label-text">Jenis Kelamin</span>
                    </label>
                    <select id="jenis_kelamin" name="jenis_kelamin" class="select select-bordered w-full">
                        <option value="Pria" {{ $user->jenis_kelamin == 'Pria' ? 'selected' : '' }}>Pria</option>
                        <option value="Wanita" {{ $user->jenis_kelamin == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                    </select>
                </div>
                <div class="form-control">
                    <label class="label" for="status_menikah">
                        <span class="label-text">Status Menikah</span>
                    </label>
                    <select id="status_menikah" name="status_menikah" class="select select-bordered w-full">
                        <option value="Belum Menikah" {{ $user->status_menikah == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                        <option value="Menikah" {{ $user->status_menikah == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                        <option value="Lain-lain" {{ $user->status_menikah == 'Lain-lain' ? 'selected' : '' }}>Lain-lain (Janda/Duda)</option>
                    </select>
                </div>
                <div class="form-control">
                    <label class="label" for="agama">
                        <span class="label-text">Agama</span>
                    </label>
                    <select id="agama" name="agama" class="select select-bordered w-full">
                        <option value="Islam" {{ $user->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                        <option value="Katolik" {{ $user->agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                        <option value="Kristen" {{ $user->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                        <option value="Hindu" {{ $user->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                        <option value="Budha" {{ $user->agama == 'Budha' ? 'selected' : '' }}>Budha</option>
                    </select>
                </div>
                <div class="form-control">
    <label class="label" for="role_id">
        <span class="label-text">Role</span>
    </label>
    <select id="role_id" name="role_id" class="select select-bordered w-full" required>
        @foreach($roles as $role)
            <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
        @endforeach
    </select>
</div>
                <div class="form-control mt-6">
                    <button type="submit" class="btn btn-primary w-full">Update User</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Include Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Initialize Select2 -->
<script>
    $(document).ready(function() {
        $('#provinsi').select2({
            placeholder: "{{ __('Pilih Provinsi') }}"
        });
        $('#kabupaten').select2({
            placeholder: "{{ __('Pilih Kabupaten') }}"
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const data = {
            "NAD Aceh": {
                "Kabupaten Aceh Barat": [],
                "Kabupaten Aceh Barat Daya": [],
                "Kabupaten Aceh Besar": [],
                "Kabupaten Aceh Jaya": [],
                "Kabupaten Aceh Selatan": [],
                "Kabupaten Aceh Singkil": [],
                "Kabupaten Aceh Tamiang": [],
                "Kabupaten Aceh Tengah": [],
                "Kabupaten Aceh Tenggara": [],
                "Kabupaten Aceh Timur": [],
                "Kabupaten Aceh Utara": [],
                "Kabupaten Bener Meriah": [],
                "Kabupaten Bireuen": [],
                "Kabupaten Gayo Lues": [],
                "Kabupaten Nagan Raya": [],
                "Kabupaten Pidie": [],
                "Kabupaten Pidie Jaya": [],
                "Kabupaten Simeulue": [],
                "Kota Banda Aceh": [],
                "Kota Langsa": [],
                "Kota Lhokseumawe": [],
                "Kota Sabang": [],
                "Kota Subulussalam": []
            },
            "Sumatera Utara": {
                "Kabupaten Asahan": [],
                "Kabupaten Batubara": [],
                "Kabupaten Dairi": [],
                "Kabupaten Deli Serdang": [],
                "Kabupaten Humbang Hasundutan": [],
                "Kabupaten Karo": [],
                "Kabupaten Labuhanbatu": [],
                "Kabupaten Labuhanbatu Selatan": [],
                "Kabupaten Labuhanbatu Utara": [],
                "Kabupaten Langkat": [],
                "Kabupaten Mandailing Natal": [],
                "Kabupaten Nias": [],
                "Kabupaten Nias Barat": [],
                "Kabupaten Nias Selatan": [],
                "Kabupaten Nias Utara": [],
                "Kabupaten Padang Lawas": [],
                "Kabupaten Padang Lawas Utara": [],
                "Kabupaten Pakpak Bharat": [],
                "Kabupaten Samosir": [],
                "Kabupaten Serdang Bedagai": [],
                "Kabupaten Simalungun": [],
                "Kabupaten Tapanuli Selatan": [],
                "Kabupaten Tapanuli Tengah": [],
                "Kabupaten Tapanuli Utara": [],
                "Kabupaten Toba Samosir": [],
                "Kota Binjai": [],
                "Kota Gunungsitoli": [],
                "Kota Medan": [],
                "Kota Padangsidempuan": [],
                "Kota Pematangsiantar": [],
                "Kota Sibolga": [],
                "Kota Tanjungbalai": [],
                "Kota Tebing Tinggi": []
            },
            "Sumatera Barat": {
            "Kabupaten Agam": [],
            "Kabupaten Dharmasraya": [],
            "Kabupaten Kepulauan Mentawai": [],
            "Kabupaten Lima Puluh Kota": [],
            "Kabupaten Padang Pariaman": [],
            "Kabupaten Pasaman": [],
            "Kabupaten Pasaman Barat": [],
            "Kabupaten Pesisir Selatan": [],
            "Kabupaten Sijunjung": [],
            "Kabupaten Solok": [],
            "Kabupaten Solok Selatan": [],
            "Kabupaten Tanah Datar": [],
            "Kota Bukittinggi": [],
            "Kota Padang": [],
            "Kota Padangpanjang": [],
            "Kota Pariaman": [],
            "Kota Payakumbuh": [],
            "Kota Sawahlunto": [],
            "Kota Solok": []
        },
        "Sumatera Selatan": {
            "Kabupaten Banyuasin": [],
            "Kabupaten Empat Lawang": [],
            "Kabupaten Lahat": [],
            "Kabupaten Muara Enim": [],
            "Kabupaten Musi Banyuasin": [],
            "Kabupaten Musi Rawas": [],
            "Kabupaten Musi Rawas Utara": [],
            "Kabupaten Ogan Ilir": [],
            "Kabupaten Ogan Komering Ilir": [],
            "Kabupaten Ogan Komering Ulu": [],
            "Kabupaten Ogan Komering Ulu Selatan": [],
            "Kabupaten Ogan Komering Ulu Timur": [],
            "Kabupaten Penukal Abab Lematang Ilir": [],
            "Kota Lubuklinggau": [],
            "Kota Pagar Alam": [],
            "Kota Palembang": [],
            "Kota Prabumulih": []
        },
        "Riau": {
            "Kabupaten Bengkalis": [],
            "Kabupaten Indragiri Hilir": [],
            "Kabupaten Indragiri Hulu": [],
            "Kabupaten Kampar": [],
            "Kabupaten Kepulauan Meranti": [],
            "Kabupaten Kuantan Singingi": [],
            "Kabupaten Pelalawan": [],
            "Kabupaten Rokan Hilir": [],
            "Kabupaten Rokan Hulu": [],
            "Kabupaten Siak": [],
            "Kota Dumai": [],
            "Kota Pekanbaru": []
        },
        "Jambi": {
    "Kabupaten Batanghari": [],
    "Kabupaten Bungo": [],
    "Kabupaten Kerinci": [],
    "Kabupaten Merangin": [],
    "Kabupaten Muaro Jambi": [],
    "Kabupaten Sarolangun": [],
    "Kabupaten Tanjung Jabung Barat": [],
    "Kabupaten Tanjung Jabung Timur": [],
    "Kabupaten Tebo": [],
    "Kota Jambi": [],
    "Kota Sungai Penuh": []
},
"Bengkulu": {
    "Kabupaten Bengkulu Selatan": [],
    "Kabupaten Bengkulu Tengah": [],
    "Kabupaten Bengkulu Utara": [],
    "Kabupaten Kaur": [],
    "Kabupaten Kepahiang": [],
    "Kabupaten Lebong": [],
    "Kabupaten Mukomuko": [],
    "Kabupaten Rejang Lebong": [],
    "Kabupaten Seluma": [],
    "Kota Bengkulu": []
},
"Bangka Belitung (BABEL)": {
    "Kabupaten Bangka": [],
    "Kabupaten Bangka Barat": [],
    "Kabupaten Bangka Selatan": [],
    "Kabupaten Bangka Tengah": [],
    "Kabupaten Belitung": [],
    "Kabupaten Belitung Timur": [],
    "Kota Pangkal Pinang": []
},
"Lampung": {
    "Kabupaten Lampung Tengah": [],
    "Kabupaten Lampung Utara": [],
    "Kabupaten Lampung Selatan": [],
    "Kabupaten Lampung Barat": [],
    "Kabupaten Lampung Timur": [],
    "Kabupaten Mesuji": [],
    "Kabupaten Pesawaran": [],
    "Kabupaten Pesisir Barat": [],
    "Kabupaten Pringsewu": [],
    "Kabupaten Tulang Bawang": [],
    "Kabupaten Tulang Bawang Barat": [],
    "Kabupaten Tanggamus": [],
    "Kabupaten Way Kanan": [],
    "Kota Bandar Lampung": [],
    "Kota Metro": []
},
"Banten": {
    "Kabupaten Lebak": [],
    "Kabupaten Pandeglang": [],
    "Kabupaten Serang": [],
    "Kabupaten Tangerang": [],
    "Kota Cilegon": [],
    "Kota Serang": [],
    "Kota Tangerang": [],
    "Kota Tangerang Selatan": []
},
"Jawa Barat": {
    "Kabupaten Bandung": [],
    "Kabupaten Bandung Barat": [],
    "Kabupaten Bekasi": [],
    "Kabupaten Bogor": [],
    "Kabupaten Ciamis": [],
    "Kabupaten Cianjur": [],
    "Kabupaten Cirebon": [],
    "Kabupaten Garut": [],
    "Kabupaten Indramayu": [],
    "Kabupaten Karawang": [],
    "Kabupaten Kuningan": [],
    "Kabupaten Majalengka": [],
    "Kabupaten Pangandaran": [],
    "Kabupaten Purwakarta": [],
    "Kabupaten Subang": [],
    "Kabupaten Sukabumi": [],
    "Kabupaten Sumedang": [],
    "Kabupaten Tasikmalaya": [],
    "Kota Bandung": [],
    "Kota Banjar": [],
    "Kota Bekasi": [],
    "Kota Bogor": [],
    "Kota Cimahi": [],
    "Kota Cirebon": [],
    "Kota Depok": [],
    "Kota Sukabumi": [],
    "Kota Tasikmalaya": []
},
"Jawa Tengah": {
    "Kabupaten Banjarnegara": [],
    "Kabupaten Banyumas": [],
    "Kabupaten Batang": [],
    "Kabupaten Blora": [],
    "Kabupaten Boyolali": [],
    "Kabupaten Brebes": [],
    "Kabupaten Cilacap": [],
    "Kabupaten Demak": [],
    "Kabupaten Grobogan": [],
    "Kabupaten Jepara": [],
    "Kabupaten Karanganyar": [],
    "Kabupaten Kebumen": [],
    "Kabupaten Kendal": [],
    "Kabupaten Klaten": [],
    "Kabupaten Kudus": [],
    "Kabupaten Magelang": [],
    "Kabupaten Pati": [],
    "Kabupaten Pekalongan": [],
    "Kabupaten Pemalang": [],
    "Kabupaten Purbalingga": [],
    "Kabupaten Purworejo": [],
    "Kabupaten Rembang": [],
    "Kabupaten Semarang": [],
    "Kabupaten Sragen": [],
    "Kabupaten Sukoharjo": [],
    "Kabupaten Tegal": [],
    "Kabupaten Temanggung": [],
    "Kabupaten Wonogiri": [],
    "Kabupaten Wonosobo": [],
    "Kota Magelang": [],
    "Kota Pekalongan": [],
    "Kota Salatiga": [],
    "Kota Semarang": [],
    "Kota Surakarta": [],
    "Kota Tegal": []
},
"Jawa Timur": {
    "Kabupaten Bangkalan": [],
    "Kabupaten Banyuwangi": [],
    "Kabupaten Blitar": [],
    "Kabupaten Bojonegoro": [],
    "Kabupaten Bondowoso": [],
    "Kabupaten Gresik": [],
    "Kabupaten Jember": [],
    "Kabupaten Jombang": [],
    "Kabupaten Kediri": [],
    "Kabupaten Lamongan": [],
    "Kabupaten Lumajang": [],
    "Kabupaten Madiun": [],
    "Kabupaten Magetan": [],
    "Kabupaten Malang": [],
    "Kabupaten Mojokerto": [],
    "Kabupaten Nganjuk": [],
    "Kabupaten Ngawi": [],
    "Kabupaten Pacitan": [],
    "Kabupaten Pamekasan": [],
    "Kabupaten Pasuruan": [],
    "Kabupaten Ponorogo": [],
    "Kabupaten Probolinggo": [],
    "Kabupaten Sampang": [],
    "Kabupaten Sidoarjo": [],
    "Kabupaten Situbondo": [],
    "Kabupaten Sumenep": [],
    "Kabupaten Trenggalek": [],
    "Kabupaten Tuban": [],
    "Kabupaten Tulungagung": [],
    "Kota Batu": [],
    "Kota Blitar": [],
    "Kota Kediri": [],
    "Kota Madiun": [],
    "Kota Malang": [],
    "Kota Mojokerto": [],
    "Kota Pasuruan": [],
    "Kota Probolinggo": [],
    "Kota Surabaya": []
},
"DKI Jakarta": {
    "Kota Administrasi Jakarta Barat": [],
    "Kota Administrasi Jakarta Pusat": [],
    "Kota Administrasi Jakarta Selatan": [],
    "Kota Administrasi Jakarta Timur": [],
    "Kota Administrasi Jakarta Utara": [],
    "Kabupaten Administrasi Kepulauan Seribu": []
},
"Daerah Istimewa Yogyakarta": {
    "Kabupaten Bantul": [],
    "Kabupaten Gunungkidul": [],
    "Kabupaten Kulon Progo": [],
    "Kabupaten Sleman": [],
    "Kota Yogyakarta": []
},
"Bali": {
    "Kabupaten Badung": [],
    "Kabupaten Bangli": [],
    "Kabupaten Buleleng": [],
    "Kabupaten Gianyar": [],
    "Kabupaten Jembrana": [],
    "Kabupaten Karangasem": [],
    "Kabupaten Klungkung": [],
    "Kabupaten Tabanan": [],
    "Kota Denpasar": []
},
"Nusa Tenggara Barat (NTB)": {
    "Kabupaten Bima": [],
    "Kabupaten Dompu": [],
    "Kabupaten Lombok Barat": [],
    "Kabupaten Lombok Tengah": [],
    "Kabupaten Lombok Timur": [],
    "Kabupaten Lombok Utara": [],
    "Kabupaten Sumbawa": [],
    "Kabupaten Sumbawa Barat": [],
    "Kota Bima": [],
    "Kota Mataram": []
},
"Nusa Tenggara Timur (NTT)": {
    "Kabupaten Alor": [],
    "Kabupaten Belu": [],
    "Kabupaten Ende": [],
    "Kabupaten Flores Timur": [],
    "Kabupaten Kupang": [],
    "Kabupaten Lembata": [],
    "Kabupaten Malaka": [],
    "Kabupaten Manggarai": [],
    "Kabupaten Manggarai Barat": [],
    "Kabupaten Manggarai Timur": [],
    "Kabupaten Ngada": [],
    "Kabupaten Nagekeo": [],
    "Kabupaten Rote Ndao": [],
    "Kabupaten Sabu Raijua": [],
    "Kabupaten Sikka": [],
    "Kabupaten Sumba Barat": [],
    "Kabupaten Sumba Barat Daya": [],
    "Kabupaten Sumba Tengah": [],
    "Kabupaten Sumba Timur": [],
    "Kabupaten Timor Tengah Selatan": [],
    "Kabupaten Timor Tengah Utara": [],
    "Kota Kupang": []
},
"Kalimantan Barat": {
    "Kabupaten Bengkayang": [],
    "Kabupaten Kapuas Hulu": [],
    "Kabupaten Kayong Utara": [],
    "Kabupaten Ketapang": [],
    "Kabupaten Kubu Raya": [],
    "Kabupaten Landak": [],
    "Kabupaten Melawi": [],
    "Kabupaten Mempawah": [],
    "Kabupaten Sambas": [],
    "Kabupaten Sanggau": [],
    "Kabupaten Sekadau": [],
    "Kabupaten Sintang": [],
    "Kota Pontianak": [],
    "Kota Singkawang": []
},
"Kalimantan Selatan": {
    "Kabupaten Balangan": [],
    "Kabupaten Banjar": [],
    "Kabupaten Barito Kuala": [],
    "Kabupaten Hulu Sungai Selatan": [],
    "Kabupaten Hulu Sungai Tengah": [],
    "Kabupaten Hulu Sungai Utara": [],
    "Kabupaten Kotabaru": [],
    "Kabupaten Tabalong": [],
    "Kabupaten Tanah Bumbu": [],
    "Kabupaten Tanah Laut": [],
    "Kabupaten Tapin": [],
    "Kota Banjarbaru": [],
    "Kota Banjarmasin": []
},
"Kalimantan Tengah": {
    "Kabupaten Barito Selatan": [],
    "Kabupaten Barito Timur": [],
    "Kabupaten Barito Utara": [],
    "Kabupaten Gunung Mas": [],
    "Kabupaten Kapuas": [],
    "Kabupaten Katingan": [],
    "Kabupaten Kotawaringin Barat": [],
    "Kabupaten Kotawaringin Timur": [],
    "Kabupaten Lamandau": [],
    "Kabupaten Murung Raya": [],
    "Kabupaten Pulang Pisau": [],
    "Kabupaten Sukamara": [],
    "Kabupaten Seruyan": [],
    "Kota Palangka Raya": []
},
"Kalimantan Timur": {
    "Kabupaten Berau": [],
    "Kabupaten Kutai Barat": [],
    "Kabupaten Kutai Kartanegara": [],
    "Kabupaten Kutai Timur": [],
    "Kabupaten Mahakam Ulu": [],
    "Kabupaten Paser": [],
    "Kabupaten Penajam Paser Utara": [],
    "Kota Balikpapan": [],
    "Kota Bontang": [],
    "Kota Samarinda": []
},
"Kalimantan Utara": {
    "Kabupaten Bulungan": [],
    "Kabupaten Malinau": [],
    "Kabupaten Nunukan": [],
    "Kabupaten Tana Tidung": [],
    "Kota Tarakan": []
},
"Gorontalo": {
    "Kabupaten Boalemo": [],
    "Kabupaten Bone Bolango": [],
    "Kabupaten Gorontalo": [],
    "Kabupaten Gorontalo Utara": [],
    "Kabupaten Pohuwato": [],
    "Kota Gorontalo": []
},
"Sulawesi Selatan": {
    "Kabupaten Bantaeng": [],
    "Kabupaten Barru": [],
    "Kabupaten Bone": [],
    "Kabupaten Bulukumba": [],
    "Kabupaten Enrekang": [],
    "Kabupaten Gowa": [],
    "Kabupaten Jeneponto": [],
    "Kabupaten Kepulauan Selayar": [],
    "Kabupaten Luwu": [],
    "Kabupaten Luwu Timur": [],
    "Kabupaten Luwu Utara": [],
    "Kabupaten Maros": [],
    "Kabupaten Pangkajene dan Kepulauan": [],
    "Kabupaten Pinrang": [],
    "Kabupaten Sidenreng Rappang": [],
    "Kabupaten Sinjai": [],
    "Kabupaten Soppeng": [],
    "Kabupaten Takalar": [],
    "Kabupaten Tana Toraja": [],
    "Kabupaten Toraja Utara": [],
    "Kabupaten Wajo": [],
    "Kota Makassar": [],
    "Kota Palopo": [],
    "Kota Parepare": []
},
"Sulawesi Tenggara": {
    "Kabupaten Bombana": [],
    "Kabupaten Buton": [],
    "Kabupaten Buton Selatan": [],
    "Kabupaten Buton Tengah": [],
    "Kabupaten Buton Utara": [],
    "Kabupaten Kolaka": [],
    "Kabupaten Kolaka Timur": [],
    "Kabupaten Kolaka Utara": [],
    "Kabupaten Konawe": [],
    "Kabupaten Konawe Kepulauan": [],
    "Kabupaten Konawe Selatan": [],
    "Kabupaten Konawe Utara": [],
    "Kabupaten Muna": [],
    "Kabupaten Muna Barat": [],
    "Kabupaten Wakatobi": [],
    "Kota Bau-Bau": [],
    "Kota Kendari": []
},
"Sulawesi Tengah": {
    "Kabupaten Banggai": [],
    "Kabupaten Banggai Kepulauan": [],
    "Kabupaten Banggai Laut": [],
    "Kabupaten Buol": [],
    "Kabupaten Donggala": [],
    "Kabupaten Morowali": [],
    "Kabupaten Morowali Utara": [],
    "Kabupaten Parigi Moutong": [],
    "Kabupaten Poso": [],
    "Kabupaten Sigi": [],
    "Kabupaten Tojo Una-Una": [],
    "Kabupaten Toli-Toli": [],
    "Kota Palu": []
},
"Sulawesi Utara": {
    "Kabupaten Bolaang Mongondow": [],
    "Kabupaten Bolaang Mongondow Selatan": [],
    "Kabupaten Bolaang Mongondow Timur": [],
    "Kabupaten Bolaang Mongondow Utara": [],
    "Kabupaten Kepulauan Sangihe": [],
    "Kabupaten Kepulauan Siau Tagulandang Biaro": [],
    "Kabupaten Kepulauan Talaud": [],
    "Kabupaten Minahasa": [],
    "Kabupaten Minahasa Selatan": [],
    "Kabupaten Minahasa Tenggara": [],
    "Kabupaten Minahasa Utara": [],
    "Kota Bitung": [],
    "Kota Kotamobagu": [],
    "Kota Manado": [],
    "Kota Tomohon": []
},
"Sulawesi Barat": {
    "Kabupaten Majene": [],
    "Kabupaten Mamasa": [],
    "Kabupaten Mamuju": [],
    "Kabupaten Mamuju Tengah": [],
    "Kabupaten Mamuju Utara": [],
    "Kabupaten Polewali Mandar": [],
    "Kota Mamuju": []
},
"Maluku": {
    "Kabupaten Buru": [],
    "Kabupaten Buru Selatan": [],
    "Kabupaten Kepulauan Aru": [],
    "Kabupaten Maluku Barat Daya": [],
    "Kabupaten Maluku Tengah": [],
    "Kabupaten Maluku Tenggara": [],
    "Kabupaten Maluku Tenggara Barat": [],
    "Kabupaten Seram Bagian Barat": [],
    "Kabupaten Seram Bagian Timur": [],
    "Kota Ambon": [],
    "Kota Tual": []
},
"Maluku Utara": {
    "Kabupaten Halmahera Barat": [],
    "Kabupaten Halmahera Tengah": [],
    "Kabupaten Halmahera Utara": [],
    "Kabupaten Halmahera Selatan": [],
    "Kabupaten Kepulauan Sula": [],
    "Kabupaten Halmahera Timur": [],
    "Kabupaten Pulau Morotai": [],
    "Kabupaten Pulau Taliabu": [],
    "Kota Ternate": [],
    "Kota Tidore Kepulauan": []
},
"Papua": {
    "Kabupaten Asmat": [],
    "Kabupaten Biak Numfor": [],
    "Kabupaten Boven Digoel": [],
    "Kabupaten Deiyai": [],
    "Kabupaten Dogiyai": [],
    "Kabupaten Intan Jaya": [],
    "Kabupaten Jayapura": [],
    "Kabupaten Jayawijaya": [],
    "Kabupaten Keerom": [],
    "Kabupaten Kepulauan Yapen": [],
    "Kabupaten Lanny Jaya": [],
    "Kabupaten Mamberamo Raya": [],
    "Kabupaten Mamberamo Tengah": [],
    "Kabupaten Mappi": [],
    "Kabupaten Merauke": [],
    "Kabupaten Mimika": [],
    "Kabupaten Nabire": [],
    "Kabupaten Nduga": [],
    "Kabupaten Paniai": [],
    "Kabupaten Pegunungan Bintang": [],
    "Kabupaten Puncak": [],
    "Kabupaten Puncak Jaya": [],
    "Kabupaten Sarmi": [],
    "Kabupaten Supiori": [],
    "Kabupaten Tolikara": [],
    "Kabupaten Waropen": [],
    "Kabupaten Yahukimo": [],
    "Kabupaten Yalimo": [],
    "Kota Jayapura": []
},
"Papua Barat": {
    "Kabupaten Fakfak": [],
    "Kabupaten Kaimana": [],
    "Kabupaten Manokwari": [],
    "Kabupaten Manokwari Selatan": [],
    "Kabupaten Maybrat": [],
    "Kabupaten Pegunungan Arfak": [],
    "Kabupaten Raja Ampat": [],
    "Kabupaten Sorong": [],
    "Kabupaten Sorong Selatan": [],
    "Kabupaten Tambrauw": [],
    "Kabupaten Teluk Bintuni": [],
    "Kabupaten Teluk Wondama": []
}







        };

        const provinsiSelect = document.getElementById('provinsi');
        const kabupatenSelect = document.getElementById('kabupaten');

        // Populate provinsi dropdown
        for (const provinsi in data) {
            const option = document.createElement('option');
            option.value = provinsi;
            option.textContent = provinsi;
            provinsiSelect.appendChild(option);
        }

        // Handle provinsi change
        provinsiSelect.addEventListener('change', function () {
            const selectedProvinsi = this.value;
            kabupatenSelect.innerHTML = '<option value="">{{ __('Pilih Kabupaten') }}</option>';

            if (selectedProvinsi) {
                const kabupatenList = data[selectedProvinsi];
                for (const kabupaten in kabupatenList) {
                    const option = document.createElement('option');
                    option.value = kabupaten;
                    option.textContent = kabupaten;
                    kabupatenSelect.appendChild(option);
                }
            }
        });
    });
</script>