<?php

use Illuminate\Support\Facades\Http;
use App\News;
use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('news')->insert([
        //     'title' => 'The news which was created by seeder!',
        //     'date' => '2021/05/17',
        //     'content' => 'Hello Seeding!'
        // ]);
        $fakeData = '{
            "Info": [
                {
                    "Ticketinfo": "大型車：假日200元、非假日170元小型車：假日60元、非假日50元機車：假日20元、非假日15元 \",
                    "Remarks": "1.石梯坪沒有遮陽設施，海邊日照強，要做好防曬；裝備也要齊全，除了遮陽的帽子、長褲、長袖，解渴的開水更不可少。2.初次造訪，建議沿木棧道前行，從第一座木造涼亭旁的石板步道下去，約2...",
                    "Keyword": "",
                    "Changetime": "2021-05-03T16:07:34+08:00"
                }
            ]
          }';
        // $result = HTTP::get('https://gis.taiwan.net.tw/XMLReleaseALL_public/scenic_spot_C_f.json');
        // $attrations = json_decode($response->body());
        // dd($attrations);
        // dd(array_slice($attrations, 0, 5));
        // dd($fakeData, urldecode($fakeData), htmlspecialchars_decode($fakeData));
        dd(str_replace($fakeData, '\\', 'aaaaaaaaaaaaaa'));
        dd(json_decode(urldecode(htmlspecialchars_decode($fakeData))));
        //   dd(json_decode(htmlspecialchars_decode($result->body())), json_last_error());
        News::create([
            'title' => 'The news which was created by seeder!',
            'date' => '2021/05/17',
            'content' => 'Hello Seeding!'
        ]);
    }
}
