<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KotobaSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('kotobas')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $kata = [];

        // =============================================
        // BAB 1 (40 kata)
        // =============================================
        $bab1 = [
            ['bab_id' => 1, 'jepang' => 'わたし', 'kanji' => '私', 'romaji' => 'watashi', 'arti' => 'saya', 'kategori' => 'Kata Ganti', 'urutan' => 1],
            ['bab_id' => 1, 'jepang' => 'あなた', 'kanji' => null, 'romaji' => 'anata', 'arti' => 'Anda/kamu', 'kategori' => 'Kata Ganti', 'urutan' => 2],
            ['bab_id' => 1, 'jepang' => 'あのひと', 'kanji' => 'あの人', 'romaji' => 'ano hito', 'arti' => 'orang itu', 'kategori' => 'Kata Ganti', 'urutan' => 3],
            ['bab_id' => 1, 'jepang' => 'あのかた', 'kanji' => 'あの方', 'romaji' => 'ano kata', 'arti' => 'orang itu (sopan)', 'kategori' => 'Kata Ganti', 'urutan' => 4],
            ['bab_id' => 1, 'jepang' => 'さん', 'kanji' => null, 'romaji' => 'san', 'arti' => 'sapaan', 'kategori' => 'Kata Ganti', 'urutan' => 5],
            ['bab_id' => 1, 'jepang' => 'ちゃん', 'kanji' => null, 'romaji' => 'chan', 'arti' => 'sapaan akrab', 'kategori' => 'Kata Ganti', 'urutan' => 6],
            ['bab_id' => 1, 'jepang' => 'じん', 'kanji' => '人', 'romaji' => 'jin', 'arti' => 'orang ~', 'kategori' => 'Kata Ganti', 'urutan' => 7],
            ['bab_id' => 1, 'jepang' => 'せんせい', 'kanji' => '先生', 'romaji' => 'sensei', 'arti' => 'guru/dosen', 'kategori' => 'Pekerjaan', 'urutan' => 8],
            ['bab_id' => 1, 'jepang' => 'きょうし', 'kanji' => '教師', 'romaji' => 'kyoushi', 'arti' => 'pengajar', 'kategori' => 'Pekerjaan', 'urutan' => 9],
            ['bab_id' => 1, 'jepang' => 'がくせい', 'kanji' => '学生', 'romaji' => 'gakusei', 'arti' => 'murid/pelajar', 'kategori' => 'Pekerjaan', 'urutan' => 10],
            ['bab_id' => 1, 'jepang' => 'かいしゃいん', 'kanji' => '会社員', 'romaji' => 'kaishain', 'arti' => 'karyawan', 'kategori' => 'Pekerjaan', 'urutan' => 11],
            ['bab_id' => 1, 'jepang' => 'しゃいん', 'kanji' => '社員', 'romaji' => 'shain', 'arti' => 'karyawan', 'kategori' => 'Pekerjaan', 'urutan' => 12],
            ['bab_id' => 1, 'jepang' => 'ぎんこういん', 'kanji' => '銀行員', 'romaji' => 'ginkouin', 'arti' => 'pegawai bank', 'kategori' => 'Pekerjaan', 'urutan' => 13],
            ['bab_id' => 1, 'jepang' => 'いしゃ', 'kanji' => '医者', 'romaji' => 'isha', 'arti' => 'dokter', 'kategori' => 'Pekerjaan', 'urutan' => 14],
            ['bab_id' => 1, 'jepang' => 'けんきゅうしゃ', 'kanji' => '研究者', 'romaji' => 'kenkyuusha', 'arti' => 'peneliti', 'kategori' => 'Pekerjaan', 'urutan' => 15],
            ['bab_id' => 1, 'jepang' => 'だいがく', 'kanji' => '大学', 'romaji' => 'daigaku', 'arti' => 'universitas', 'kategori' => 'Tempat', 'urutan' => 16],
            ['bab_id' => 1, 'jepang' => 'びょういん', 'kanji' => '病院', 'romaji' => 'byouin', 'arti' => 'rumah sakit', 'kategori' => 'Tempat', 'urutan' => 17],
            ['bab_id' => 1, 'jepang' => 'だれ', 'kanji' => '誰', 'romaji' => 'dare', 'arti' => 'siapa', 'kategori' => 'Kata Tanya', 'urutan' => 18],
            ['bab_id' => 1, 'jepang' => 'どなた', 'kanji' => null, 'romaji' => 'donata', 'arti' => 'siapa (sopan)', 'kategori' => 'Kata Tanya', 'urutan' => 19],
            ['bab_id' => 1, 'jepang' => 'さい', 'kanji' => '歳', 'romaji' => 'sai', 'arti' => 'umur', 'kategori' => 'Umur', 'urutan' => 20],
            ['bab_id' => 1, 'jepang' => 'なんさい', 'kanji' => '何歳', 'romaji' => 'nansai', 'arti' => 'berapa umur', 'kategori' => 'Kata Tanya', 'urutan' => 21],
            ['bab_id' => 1, 'jepang' => 'おいくつ', 'kanji' => null, 'romaji' => 'oikutsu', 'arti' => 'berapa umur (sopan)', 'kategori' => 'Kata Tanya', 'urutan' => 22],
            ['bab_id' => 1, 'jepang' => 'はい', 'kanji' => null, 'romaji' => 'hai', 'arti' => 'ya', 'kategori' => 'Ekspresi', 'urutan' => 23],
            ['bab_id' => 1, 'jepang' => 'いいえ', 'kanji' => null, 'romaji' => 'iie', 'arti' => 'tidak', 'kategori' => 'Ekspresi', 'urutan' => 24],
            ['bab_id' => 1, 'jepang' => 'はじめまして', 'kanji' => '初めまして', 'romaji' => 'hajimemashite', 'arti' => 'senang berkenalan', 'kategori' => 'Salam', 'urutan' => 25],
            ['bab_id' => 1, 'jepang' => 'からきました', 'kanji' => 'から来ました', 'romaji' => 'kara kimashita', 'arti' => 'datang dari', 'kategori' => 'Ungkapan', 'urutan' => 26],
            ['bab_id' => 1, 'jepang' => 'どうぞ、よろしくおねがいします', 'kanji' => 'どうぞ、よろしくお願いします', 'romaji' => 'douzo yoroshiku onegaishimasu', 'arti' => 'mohon bantuannya', 'kategori' => 'Salam', 'urutan' => 27],
            ['bab_id' => 1, 'jepang' => 'しつれいですが', 'kanji' => '失礼ですが', 'romaji' => 'shitsurei desu ga', 'arti' => 'permisi', 'kategori' => 'Ekspresi', 'urutan' => 28],
            ['bab_id' => 1, 'jepang' => 'おなまえは', 'kanji' => 'お名前は', 'romaji' => 'onamae wa', 'arti' => 'siapa nama', 'kategori' => 'Kata Tanya', 'urutan' => 29],
            ['bab_id' => 1, 'jepang' => 'こちらは…さんです', 'kanji' => null, 'romaji' => 'kochira wa...san desu', 'arti' => 'ini Tn/Ny...', 'kategori' => 'Ungkapan', 'urutan' => 30],
            ['bab_id' => 1, 'jepang' => 'アメリカ', 'kanji' => null, 'romaji' => 'amerika', 'arti' => 'Amerika', 'kategori' => 'Negara', 'urutan' => 31],
            ['bab_id' => 1, 'jepang' => 'イギリス', 'kanji' => null, 'romaji' => 'igirisu', 'arti' => 'Inggris', 'kategori' => 'Negara', 'urutan' => 32],
            ['bab_id' => 1, 'jepang' => 'インド', 'kanji' => null, 'romaji' => 'indo', 'arti' => 'India', 'kategori' => 'Negara', 'urutan' => 33],
            ['bab_id' => 1, 'jepang' => 'インドネシア', 'kanji' => null, 'romaji' => 'indoneshia', 'arti' => 'Indonesia', 'kategori' => 'Negara', 'urutan' => 34],
            ['bab_id' => 1, 'jepang' => 'かんこく', 'kanji' => '韓国', 'romaji' => 'kankoku', 'arti' => 'Korea', 'kategori' => 'Negara', 'urutan' => 35],
            ['bab_id' => 1, 'jepang' => 'タイ', 'kanji' => null, 'romaji' => 'tai', 'arti' => 'Thailand', 'kategori' => 'Negara', 'urutan' => 36],
            ['bab_id' => 1, 'jepang' => 'ちゅうごく', 'kanji' => '中国', 'romaji' => 'chuugoku', 'arti' => 'China', 'kategori' => 'Negara', 'urutan' => 37],
            ['bab_id' => 1, 'jepang' => 'ドイツ', 'kanji' => null, 'romaji' => 'doitsu', 'arti' => 'Jerman', 'kategori' => 'Negara', 'urutan' => 38],
            ['bab_id' => 1, 'jepang' => 'にほん', 'kanji' => '日本', 'romaji' => 'nihon', 'arti' => 'Jepang', 'kategori' => 'Negara', 'urutan' => 39],
            ['bab_id' => 1, 'jepang' => 'ブラジル', 'kanji' => null, 'romaji' => 'burajiru', 'arti' => 'Brasil', 'kategori' => 'Negara', 'urutan' => 40],
        ];
        $kata = array_merge($kata, $bab1);

        // =============================================
        // BAB 2 (76 kata)
        // =============================================
        $bab2 = [
            ['bab_id' => 2, 'jepang' => 'これ', 'kanji' => null, 'romaji' => 'kore', 'arti' => 'ini', 'kategori' => 'Kata Tunjuk', 'urutan' => 1],
            ['bab_id' => 2, 'jepang' => 'それ', 'kanji' => null, 'romaji' => 'sore', 'arti' => 'itu', 'kategori' => 'Kata Tunjuk', 'urutan' => 2],
            ['bab_id' => 2, 'jepang' => 'あれ', 'kanji' => null, 'romaji' => 'are', 'arti' => 'itu (jauh)', 'kategori' => 'Kata Tunjuk', 'urutan' => 3],
            ['bab_id' => 2, 'jepang' => 'この', 'kanji' => null, 'romaji' => 'kono', 'arti' => '~ ini', 'kategori' => 'Kata Tunjuk', 'urutan' => 4],
            ['bab_id' => 2, 'jepang' => 'その', 'kanji' => null, 'romaji' => 'sono', 'arti' => '~ itu', 'kategori' => 'Kata Tunjuk', 'urutan' => 5],
            ['bab_id' => 2, 'jepang' => 'あの', 'kanji' => null, 'romaji' => 'ano', 'arti' => '~ itu (jauh)', 'kategori' => 'Kata Tunjuk', 'urutan' => 6],
            ['bab_id' => 2, 'jepang' => 'ほん', 'kanji' => '本', 'romaji' => 'hon', 'arti' => 'buku', 'kategori' => 'Benda', 'urutan' => 7],
            ['bab_id' => 2, 'jepang' => 'じしょ', 'kanji' => '辞書', 'romaji' => 'jisho', 'arti' => 'kamus', 'kategori' => 'Benda', 'urutan' => 8],
            ['bab_id' => 2, 'jepang' => 'ざっし', 'kanji' => '雑誌', 'romaji' => 'zasshi', 'arti' => 'majalah', 'kategori' => 'Benda', 'urutan' => 9],
            ['bab_id' => 2, 'jepang' => 'しんぶん', 'kanji' => '新聞', 'romaji' => 'shinbun', 'arti' => 'koran', 'kategori' => 'Benda', 'urutan' => 10],
            ['bab_id' => 2, 'jepang' => 'ノート', 'kanji' => null, 'romaji' => 'nooto', 'arti' => 'buku catatan', 'kategori' => 'Benda', 'urutan' => 11],
            ['bab_id' => 2, 'jepang' => 'てちょう', 'kanji' => '手帳', 'romaji' => 'techou', 'arti' => 'buku agenda', 'kategori' => 'Benda', 'urutan' => 12],
            ['bab_id' => 2, 'jepang' => 'めいし', 'kanji' => '名刺', 'romaji' => 'meishi', 'arti' => 'kartu nama', 'kategori' => 'Benda', 'urutan' => 13],
            ['bab_id' => 2, 'jepang' => 'カード', 'kanji' => null, 'romaji' => 'kaado', 'arti' => 'kartu', 'kategori' => 'Benda', 'urutan' => 14],
            ['bab_id' => 2, 'jepang' => 'えんぴつ', 'kanji' => '鉛筆', 'romaji' => 'enpitsu', 'arti' => 'pensil', 'kategori' => 'Benda', 'urutan' => 15],
            ['bab_id' => 2, 'jepang' => 'ボールペン', 'kanji' => null, 'romaji' => 'boorupen', 'arti' => 'bolpoin', 'kategori' => 'Benda', 'urutan' => 16],
            ['bab_id' => 2, 'jepang' => 'シャープペンシル', 'kanji' => null, 'romaji' => 'shaapupenshiru', 'arti' => 'pensil mekanik', 'kategori' => 'Benda', 'urutan' => 17],
            ['bab_id' => 2, 'jepang' => 'かぎ', 'kanji' => '鍵', 'romaji' => 'kagi', 'arti' => 'kunci', 'kategori' => 'Benda', 'urutan' => 18],
            ['bab_id' => 2, 'jepang' => 'とけい', 'kanji' => '時計', 'romaji' => 'tokei', 'arti' => 'jam', 'kategori' => 'Benda', 'urutan' => 19],
            ['bab_id' => 2, 'jepang' => 'かさ', 'kanji' => '傘', 'romaji' => 'kasa', 'arti' => 'payung', 'kategori' => 'Benda', 'urutan' => 20],
            ['bab_id' => 2, 'jepang' => 'かばん', 'kanji' => '鞄', 'romaji' => 'kaban', 'arti' => 'tas', 'kategori' => 'Benda', 'urutan' => 21],
            ['bab_id' => 2, 'jepang' => 'CD', 'kanji' => null, 'romaji' => 'shii dii', 'arti' => 'CD', 'kategori' => 'Benda', 'urutan' => 22],
            ['bab_id' => 2, 'jepang' => 'テレビ', 'kanji' => null, 'romaji' => 'terebi', 'arti' => 'TV', 'kategori' => 'Benda', 'urutan' => 23],
            ['bab_id' => 2, 'jepang' => 'ラジオ', 'kanji' => null, 'romaji' => 'rajio', 'arti' => 'radio', 'kategori' => 'Benda', 'urutan' => 24],
            ['bab_id' => 2, 'jepang' => 'カメラ', 'kanji' => null, 'romaji' => 'kamera', 'arti' => 'kamera', 'kategori' => 'Benda', 'urutan' => 25],
            ['bab_id' => 2, 'jepang' => 'コンピューター', 'kanji' => null, 'romaji' => 'konpyuutaa', 'arti' => 'komputer', 'kategori' => 'Benda', 'urutan' => 26],
            ['bab_id' => 2, 'jepang' => 'くるま', 'kanji' => '車', 'romaji' => 'kuruma', 'arti' => 'mobil', 'kategori' => 'Benda', 'urutan' => 27],
            ['bab_id' => 2, 'jepang' => 'つくえ', 'kanji' => '机', 'romaji' => 'tsukue', 'arti' => 'meja', 'kategori' => 'Benda', 'urutan' => 28],
            ['bab_id' => 2, 'jepang' => 'いす', 'kanji' => '椅子', 'romaji' => 'isu', 'arti' => 'kursi', 'kategori' => 'Benda', 'urutan' => 29],
            ['bab_id' => 2, 'jepang' => 'チョコレート', 'kanji' => null, 'romaji' => 'chokoreeto', 'arti' => 'cokelat', 'kategori' => 'Makanan', 'urutan' => 30],
            ['bab_id' => 2, 'jepang' => 'コーヒー', 'kanji' => null, 'romaji' => 'koohii', 'arti' => 'kopi', 'kategori' => 'Minuman', 'urutan' => 31],
            ['bab_id' => 2, 'jepang' => '[お]みやげ', 'kanji' => 'お土産', 'romaji' => 'omiyage', 'arti' => 'oleh-oleh', 'kategori' => 'Benda', 'urutan' => 32],
            ['bab_id' => 2, 'jepang' => 'えいご', 'kanji' => '英語', 'romaji' => 'eigo', 'arti' => 'bhs Inggris', 'kategori' => 'Bahasa', 'urutan' => 33],
            ['bab_id' => 2, 'jepang' => 'にほんご', 'kanji' => '日本語', 'romaji' => 'nihongo', 'arti' => 'bhs Jepang', 'kategori' => 'Bahasa', 'urutan' => 34],
            ['bab_id' => 2, 'jepang' => 'ご', 'kanji' => '語', 'romaji' => 'go', 'arti' => 'bahasa ~', 'kategori' => 'Bahasa', 'urutan' => 35],
            ['bab_id' => 2, 'jepang' => 'なん', 'kanji' => '何', 'romaji' => 'nan', 'arti' => 'apa', 'kategori' => 'Kata Tanya', 'urutan' => 36],
            ['bab_id' => 2, 'jepang' => 'そう', 'kanji' => null, 'romaji' => 'sou', 'arti' => 'begitu', 'kategori' => 'Ekspresi', 'urutan' => 37],
            ['bab_id' => 2, 'jepang' => 'あのう', 'kanji' => null, 'romaji' => 'anou', 'arti' => 'permisi', 'kategori' => 'Ekspresi', 'urutan' => 38],
            ['bab_id' => 2, 'jepang' => 'えっ', 'kanji' => null, 'romaji' => 'e', 'arti' => 'hah', 'kategori' => 'Ekspresi', 'urutan' => 39],
            ['bab_id' => 2, 'jepang' => 'どうぞ', 'kanji' => null, 'romaji' => 'douzo', 'arti' => 'silakan', 'kategori' => 'Ekspresi', 'urutan' => 40],
            ['bab_id' => 2, 'jepang' => 'どうも、ありがとうございます', 'kanji' => null, 'romaji' => 'doumo arigatou', 'arti' => 'terima kasih banyak', 'kategori' => 'Salam', 'urutan' => 41],
            ['bab_id' => 2, 'jepang' => 'そうですか', 'kanji' => null, 'romaji' => 'sou desu ka', 'arti' => 'oh begitu', 'kategori' => 'Ekspresi', 'urutan' => 42],
            ['bab_id' => 2, 'jepang' => 'ちがいます', 'kanji' => '違います', 'romaji' => 'chigaimasu', 'arti' => 'bukan/beda', 'kategori' => 'Ekspresi', 'urutan' => 43],
            ['bab_id' => 2, 'jepang' => 'あ', 'kanji' => null, 'romaji' => 'a', 'arti' => 'ah', 'kategori' => 'Ekspresi', 'urutan' => 44],
            ['bab_id' => 2, 'jepang' => 'これから、おせわになります', 'kanji' => 'これから、お世話になります', 'romaji' => 'korekara osewa', 'arti' => 'mohon bantuannya', 'kategori' => 'Salam', 'urutan' => 45],
            ['bab_id' => 2, 'jepang' => 'こちらこそ、どうぞ、よろしくおねがいします', 'kanji' => 'こちらこそ、宜しくお願いします', 'romaji' => 'kochirakoso yoroshiku', 'arti' => 'saya juga mohon bantuannya', 'kategori' => 'Salam', 'urutan' => 46],
            ['bab_id' => 2, 'jepang' => 'ちち', 'kanji' => '父', 'romaji' => 'chichi', 'arti' => 'ayah (saya)', 'kategori' => 'Keluarga', 'urutan' => 47],
            ['bab_id' => 2, 'jepang' => 'はは', 'kanji' => '母', 'romaji' => 'haha', 'arti' => 'ibu (saya)', 'kategori' => 'Keluarga', 'urutan' => 48],
            ['bab_id' => 2, 'jepang' => 'そふ', 'kanji' => '祖父', 'romaji' => 'sofu', 'arti' => 'kakek (saya)', 'kategori' => 'Keluarga', 'urutan' => 49],
            ['bab_id' => 2, 'jepang' => 'そぼ', 'kanji' => '祖母', 'romaji' => 'sobo', 'arti' => 'nenek (saya)', 'kategori' => 'Keluarga', 'urutan' => 50],
            ['bab_id' => 2, 'jepang' => 'あに', 'kanji' => '兄', 'romaji' => 'ani', 'arti' => 'kakak laki-laki (saya)', 'kategori' => 'Keluarga', 'urutan' => 51],
            ['bab_id' => 2, 'jepang' => 'あね', 'kanji' => '姉', 'romaji' => 'ane', 'arti' => 'kakak perempuan (saya)', 'kategori' => 'Keluarga', 'urutan' => 52],
            ['bab_id' => 2, 'jepang' => 'おとうと', 'kanji' => '弟', 'romaji' => 'otouto', 'arti' => 'adik laki-laki (saya)', 'kategori' => 'Keluarga', 'urutan' => 53],
            ['bab_id' => 2, 'jepang' => 'いもうと', 'kanji' => '妹', 'romaji' => 'imouto', 'arti' => 'adik perempuan (saya)', 'kategori' => 'Keluarga', 'urutan' => 54],
            ['bab_id' => 2, 'jepang' => 'おっと', 'kanji' => '夫', 'romaji' => 'otto', 'arti' => 'suami (saya)', 'kategori' => 'Keluarga', 'urutan' => 55],
            ['bab_id' => 2, 'jepang' => 'つま', 'kanji' => '妻', 'romaji' => 'tsuma', 'arti' => 'istri (saya)', 'kategori' => 'Keluarga', 'urutan' => 56],
            ['bab_id' => 2, 'jepang' => 'むすこ', 'kanji' => '息子', 'romaji' => 'musuko', 'arti' => 'anak laki-laki', 'kategori' => 'Keluarga', 'urutan' => 57],
            ['bab_id' => 2, 'jepang' => 'むすめ', 'kanji' => '娘', 'romaji' => 'musume', 'arti' => 'anak perempuan', 'kategori' => 'Keluarga', 'urutan' => 58],
            ['bab_id' => 2, 'jepang' => 'おじ', 'kanji' => '伯父/叔父', 'romaji' => 'oji', 'arti' => 'paman', 'kategori' => 'Keluarga', 'urutan' => 59],
            ['bab_id' => 2, 'jepang' => 'おば', 'kanji' => '伯母/叔母', 'romaji' => 'oba', 'arti' => 'bibi', 'kategori' => 'Keluarga', 'urutan' => 60],
            ['bab_id' => 2, 'jepang' => 'いとこ', 'kanji' => '従兄弟', 'romaji' => 'itoko', 'arti' => 'sepupu', 'kategori' => 'Keluarga', 'urutan' => 61],
            ['bab_id' => 2, 'jepang' => 'おとうさん', 'kanji' => 'お父さん', 'romaji' => 'otousan', 'arti' => 'ayah (orang lain)', 'kategori' => 'Keluarga', 'urutan' => 62],
            ['bab_id' => 2, 'jepang' => 'おかあさん', 'kanji' => 'お母さん', 'romaji' => 'okaasan', 'arti' => 'ibu (orang lain)', 'kategori' => 'Keluarga', 'urutan' => 63],
            ['bab_id' => 2, 'jepang' => 'おじいさん', 'kanji' => null, 'romaji' => 'ojiisan', 'arti' => 'kakek (orang lain)', 'kategori' => 'Keluarga', 'urutan' => 64],
            ['bab_id' => 2, 'jepang' => 'おばあさん', 'kanji' => null, 'romaji' => 'obaasan', 'arti' => 'nenek (orang lain)', 'kategori' => 'Keluarga', 'urutan' => 65],
            ['bab_id' => 2, 'jepang' => 'おにいさん', 'kanji' => 'お兄さん', 'romaji' => 'oniisan', 'arti' => 'kakak laki-laki (orang lain)', 'kategori' => 'Keluarga', 'urutan' => 66],
            ['bab_id' => 2, 'jepang' => 'おねえさん', 'kanji' => 'お姉さん', 'romaji' => 'oneesan', 'arti' => 'kakak perempuan (orang lain)', 'kategori' => 'Keluarga', 'urutan' => 67],
            ['bab_id' => 2, 'jepang' => 'おとうとさん', 'kanji' => '弟さん', 'romaji' => 'otoutosan', 'arti' => 'adik laki-laki (orang lain)', 'kategori' => 'Keluarga', 'urutan' => 68],
            ['bab_id' => 2, 'jepang' => 'いもうとさん', 'kanji' => '妹さん', 'romaji' => 'imoutosan', 'arti' => 'adik perempuan (orang lain)', 'kategori' => 'Keluarga', 'urutan' => 69],
            ['bab_id' => 2, 'jepang' => 'ごしゅじん', 'kanji' => 'ご主人', 'romaji' => 'goshujin', 'arti' => 'suami (orang lain)', 'kategori' => 'Keluarga', 'urutan' => 70],
            ['bab_id' => 2, 'jepang' => 'おくさん', 'kanji' => '奥さん', 'romaji' => 'okusan', 'arti' => 'istri (orang lain)', 'kategori' => 'Keluarga', 'urutan' => 71],
            ['bab_id' => 2, 'jepang' => 'むすこさん', 'kanji' => '息子さん', 'romaji' => 'musukosan', 'arti' => 'anak laki-laki (orang lain)', 'kategori' => 'Keluarga', 'urutan' => 72],
            ['bab_id' => 2, 'jepang' => 'おじょうさん', 'kanji' => 'お嬢さん', 'romaji' => 'ojousan', 'arti' => 'anak perempuan (orang lain)', 'kategori' => 'Keluarga', 'urutan' => 73],
            ['bab_id' => 2, 'jepang' => 'おじさん', 'kanji' => '伯父さん', 'romaji' => 'ojisan', 'arti' => 'paman (orang lain)', 'kategori' => 'Keluarga', 'urutan' => 74],
            ['bab_id' => 2, 'jepang' => 'おばさん', 'kanji' => '伯母さん', 'romaji' => 'obasan', 'arti' => 'bibi (orang lain)', 'kategori' => 'Keluarga', 'urutan' => 75],
            ['bab_id' => 2, 'jepang' => 'いとこさん', 'kanji' => null, 'romaji' => 'itokosan', 'arti' => 'sepupu (orang lain)', 'kategori' => 'Keluarga', 'urutan' => 76],
        ];
        $kata = array_merge($kata, $bab2);

        // =============================================
        // BAB 3 (49 kata)
        // =============================================
        $bab3 = [
            ['bab_id' => 3, 'jepang' => 'ここ', 'kanji' => null, 'romaji' => 'koko', 'arti' => 'di sini', 'kategori' => 'Kata Tunjuk', 'urutan' => 1],
            ['bab_id' => 3, 'jepang' => 'そこ', 'kanji' => null, 'romaji' => 'soko', 'arti' => 'di situ', 'kategori' => 'Kata Tunjuk', 'urutan' => 2],
            ['bab_id' => 3, 'jepang' => 'あそこ', 'kanji' => null, 'romaji' => 'asoko', 'arti' => 'di sana', 'kategori' => 'Kata Tunjuk', 'urutan' => 3],
            ['bab_id' => 3, 'jepang' => 'どこ', 'kanji' => null, 'romaji' => 'doko', 'arti' => 'di mana', 'kategori' => 'Kata Tanya', 'urutan' => 4],
            ['bab_id' => 3, 'jepang' => 'こちら', 'kanji' => null, 'romaji' => 'kochira', 'arti' => 'di sini (sopan)', 'kategori' => 'Kata Tunjuk', 'urutan' => 5],
            ['bab_id' => 3, 'jepang' => 'そちら', 'kanji' => null, 'romaji' => 'sochira', 'arti' => 'di situ (sopan)', 'kategori' => 'Kata Tunjuk', 'urutan' => 6],
            ['bab_id' => 3, 'jepang' => 'あちら', 'kanji' => null, 'romaji' => 'achira', 'arti' => 'di sana (sopan)', 'kategori' => 'Kata Tunjuk', 'urutan' => 7],
            ['bab_id' => 3, 'jepang' => 'どちら', 'kanji' => null, 'romaji' => 'dochira', 'arti' => 'di mana (sopan)', 'kategori' => 'Kata Tanya', 'urutan' => 8],
            ['bab_id' => 3, 'jepang' => 'きょうしつ', 'kanji' => '教室', 'romaji' => 'kyoushitsu', 'arti' => 'ruang kelas', 'kategori' => 'Tempat', 'urutan' => 9],
            ['bab_id' => 3, 'jepang' => 'しょくどう', 'kanji' => '食堂', 'romaji' => 'shokudou', 'arti' => 'kantin', 'kategori' => 'Tempat', 'urutan' => 10],
            ['bab_id' => 3, 'jepang' => 'じむしょ', 'kanji' => '事務所', 'romaji' => 'jimusho', 'arti' => 'kantor', 'kategori' => 'Tempat', 'urutan' => 11],
            ['bab_id' => 3, 'jepang' => 'かいぎしつ', 'kanji' => '会議室', 'romaji' => 'kaigishitsu', 'arti' => 'ruang rapat', 'kategori' => 'Tempat', 'urutan' => 12],
            ['bab_id' => 3, 'jepang' => 'うけつけ', 'kanji' => '受付', 'romaji' => 'uketsuke', 'arti' => 'resepsionis', 'kategori' => 'Tempat', 'urutan' => 13],
            ['bab_id' => 3, 'jepang' => 'ロビー', 'kanji' => null, 'romaji' => 'robii', 'arti' => 'lobi', 'kategori' => 'Tempat', 'urutan' => 14],
            ['bab_id' => 3, 'jepang' => 'へや', 'kanji' => '部屋', 'romaji' => 'heya', 'arti' => 'kamar', 'kategori' => 'Tempat', 'urutan' => 15],
            ['bab_id' => 3, 'jepang' => 'おてあらい/トイレ', 'kanji' => 'お手洗い', 'romaji' => 'toire', 'arti' => 'toilet', 'kategori' => 'Tempat', 'urutan' => 16],
            ['bab_id' => 3, 'jepang' => 'かいだん', 'kanji' => '階段', 'romaji' => 'kaidan', 'arti' => 'tangga', 'kategori' => 'Tempat', 'urutan' => 17],
            ['bab_id' => 3, 'jepang' => 'エレベーター', 'kanji' => null, 'romaji' => 'erebeetaa', 'arti' => 'lift', 'kategori' => 'Tempat', 'urutan' => 18],
            ['bab_id' => 3, 'jepang' => 'エスカレーター', 'kanji' => null, 'romaji' => 'esukareetaa', 'arti' => 'eskalator', 'kategori' => 'Tempat', 'urutan' => 19],
            ['bab_id' => 3, 'jepang' => 'じどうはんばいき', 'kanji' => '自動販売機', 'romaji' => 'jidouhanbaiki', 'arti' => 'mesin penjual', 'kategori' => 'Benda', 'urutan' => 20],
            ['bab_id' => 3, 'jepang' => 'でんわ', 'kanji' => '電話', 'romaji' => 'denwa', 'arti' => 'telepon', 'kategori' => 'Benda', 'urutan' => 21],
            ['bab_id' => 3, 'jepang' => '[お]くに', 'kanji' => 'お国', 'romaji' => 'okuni', 'arti' => 'negara', 'kategori' => 'Lainnya', 'urutan' => 22],
            ['bab_id' => 3, 'jepang' => 'かいしゃ', 'kanji' => '会社', 'romaji' => 'kaisha', 'arti' => 'perusahaan', 'kategori' => 'Tempat', 'urutan' => 23],
            ['bab_id' => 3, 'jepang' => 'うち', 'kanji' => '家', 'romaji' => 'uchi', 'arti' => 'rumah', 'kategori' => 'Tempat', 'urutan' => 24],
            ['bab_id' => 3, 'jepang' => 'くつ', 'kanji' => '靴', 'romaji' => 'kutsu', 'arti' => 'sepatu', 'kategori' => 'Benda', 'urutan' => 25],
            ['bab_id' => 3, 'jepang' => 'ネクタイ', 'kanji' => null, 'romaji' => 'nekutai', 'arti' => 'dasi', 'kategori' => 'Benda', 'urutan' => 26],
            ['bab_id' => 3, 'jepang' => 'ワイン', 'kanji' => null, 'romaji' => 'wain', 'arti' => 'wine/anggur', 'kategori' => 'Minuman', 'urutan' => 27],
            ['bab_id' => 3, 'jepang' => 'うりば', 'kanji' => '売り場', 'romaji' => 'uriba', 'arti' => 'tempat jualan', 'kategori' => 'Tempat', 'urutan' => 28],
            ['bab_id' => 3, 'jepang' => 'ちか', 'kanji' => '地下', 'romaji' => 'chika', 'arti' => 'bawah tanah', 'kategori' => 'Tempat', 'urutan' => 29],
            ['bab_id' => 3, 'jepang' => 'かい/がい', 'kanji' => '階', 'romaji' => 'kai', 'arti' => 'lantai', 'kategori' => 'Lainnya', 'urutan' => 30],
            ['bab_id' => 3, 'jepang' => 'なんがい', 'kanji' => '何階', 'romaji' => 'nangai', 'arti' => 'lantai berapa', 'kategori' => 'Kata Tanya', 'urutan' => 31],
            ['bab_id' => 3, 'jepang' => 'えん', 'kanji' => '円', 'romaji' => 'en', 'arti' => 'yen', 'kategori' => 'Uang', 'urutan' => 32],
            ['bab_id' => 3, 'jepang' => 'いくら', 'kanji' => null, 'romaji' => 'ikura', 'arti' => 'berapa harga', 'kategori' => 'Kata Tanya', 'urutan' => 33],
            ['bab_id' => 3, 'jepang' => 'ひゃく', 'kanji' => '百', 'romaji' => 'hyaku', 'arti' => '100', 'kategori' => 'Angka', 'urutan' => 34],
            ['bab_id' => 3, 'jepang' => 'せん', 'kanji' => '千', 'romaji' => 'sen', 'arti' => '1000', 'kategori' => 'Angka', 'urutan' => 35],
            ['bab_id' => 3, 'jepang' => 'まん', 'kanji' => '万', 'romaji' => 'man', 'arti' => '10000', 'kategori' => 'Angka', 'urutan' => 36],
            ['bab_id' => 3, 'jepang' => 'すみません', 'kanji' => null, 'romaji' => 'sumimasen', 'arti' => 'maaf/permisi', 'kategori' => 'Ekspresi', 'urutan' => 37],
            ['bab_id' => 3, 'jepang' => 'どうも', 'kanji' => null, 'romaji' => 'doumo', 'arti' => 'terima kasih/makasih', 'kategori' => 'Ekspresi', 'urutan' => 38],
            ['bab_id' => 3, 'jepang' => 'いらっしゃいませ', 'kanji' => null, 'romaji' => 'irasshaimase', 'arti' => 'selamat datang', 'kategori' => 'Salam', 'urutan' => 39],
            ['bab_id' => 3, 'jepang' => 'みせてください', 'kanji' => '見せてください', 'romaji' => 'misete kudasai', 'arti' => 'tolong perlihatkan', 'kategori' => 'Ungkapan', 'urutan' => 40],
            ['bab_id' => 3, 'jepang' => 'じゃ', 'kanji' => null, 'romaji' => 'ja', 'arti' => 'kalau begitu', 'kategori' => 'Ekspresi', 'urutan' => 41],
            ['bab_id' => 3, 'jepang' => 'ください', 'kanji' => '下さい', 'romaji' => 'kudasai', 'arti' => 'tolong berikan', 'kategori' => 'Ungkapan', 'urutan' => 42],
            ['bab_id' => 3, 'jepang' => 'イタリア', 'kanji' => null, 'romaji' => 'itaria', 'arti' => 'Italia', 'kategori' => 'Negara', 'urutan' => 43],
            ['bab_id' => 3, 'jepang' => 'スイス', 'kanji' => null, 'romaji' => 'suisu', 'arti' => 'Swiss', 'kategori' => 'Negara', 'urutan' => 44],
            ['bab_id' => 3, 'jepang' => 'フランス', 'kanji' => null, 'romaji' => 'furansu', 'arti' => 'Prancis', 'kategori' => 'Negara', 'urutan' => 45],
            ['bab_id' => 3, 'jepang' => 'ジャカルタ', 'kanji' => null, 'romaji' => 'jakaruta', 'arti' => 'Jakarta', 'kategori' => 'Kota', 'urutan' => 46],
            ['bab_id' => 3, 'jepang' => 'バンコク', 'kanji' => null, 'romaji' => 'bankoku', 'arti' => 'Bangkok', 'kategori' => 'Kota', 'urutan' => 47],
            ['bab_id' => 3, 'jepang' => 'ベルリン', 'kanji' => null, 'romaji' => 'berurin', 'arti' => 'Berlin', 'kategori' => 'Kota', 'urutan' => 48],
            ['bab_id' => 3, 'jepang' => 'しんおおさか', 'kanji' => '新大阪', 'romaji' => 'shin oosaka', 'arti' => 'Shin Osaka', 'kategori' => 'Kota', 'urutan' => 49],
        ];
        $kata = array_merge($kata, $bab3);

        foreach ($kata as $k) {
            DB::table('kotobas')->insert([
                'bab_id' => $k['bab_id'],
                'jepang' => $k['jepang'],
                'kanji' => $k['kanji'],
                'romaji' => $k['romaji'],
                'arti' => $k['arti'],
                'kategori' => $k['kategori'],
                'urutan' => $k['urutan'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}