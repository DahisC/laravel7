<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
    </head>
    <body>
        <form action="/news/create" method="POST">
            @csrf
            <div>
                <input type="text" hidden name="id" value="" />
            </div>
            <div>
                <input type="text" placeholder="標題 title" name="title" value="世界が癒される国産ビートメイカーDJ OKAWARIとは？" />
            </div>
            <div>
                <input type="text" placeholder="日期 date" name="date" value="2021-05-05" />
            </div>
            <div>
                <input type="text" placeholder="圖片 img" name="img" value="https://i.ytimg.com/vi/UjLnvXpkq68/maxresdefault.jpg" />
            </div>
            <div>
                <textarea type="text" placeholder="內容 Content" name="content">静岡から世界に誇るビートメイカーDJ OKAWARIは必ず覚えておきたいアーティストの一人。\nDJ Okawariは日本のDJ、音楽プロデューサー、作曲家だ。「音楽と日常の共存」をテーマに掲げ、生活していく中で感じた事を音で表現している。「DJ OKAWARI」という名前は、常に満足することなく、常に新たなものを模索し、常に挑戦し続けるところに由来するそうだ。美しく柔らかな音色のピアノジャズとヒップホップを組み合わせた独創的な手法の音楽は多くの人に愛されている。アルバムの絵は日本のグラフィックデザイナー、マルヤミンによって描かれている。アルバム「Mirror」の収録曲「Luv Letter」は2010年世界フィギュアスケート選手権に高橋大輔のプログラムにて使用されていた。</textarea>
            </div>
            <div>
                <input type="text" placeholder="瀏覽次數 views" name="views" value="0" />
            </div>
            <button type="submit">新增</button>
        </form>
    </body>
</html>
