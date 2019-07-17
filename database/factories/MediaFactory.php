<?php

use App\Acme\Models\Category;
use App\Acme\Models\Media;
use App\Acme\Models\Post;
use App\Acme\Models\User;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Media::class, function (Faker $faker) {
    // Images already uploaded to aws bucket
    $awsImages = [
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/1/23/3b9zvtfLY4NPlAAocGVkcANWi7qOyDzW9pl2g1LC.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/1/23/d9TUOgIqa9E2KjTJFqsIxh8pWwXYovXVp4spi84I.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/1/24/6INb8oGnVT35FMm16mOdPX8LolUeftRT7ne0b5nk.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/1/25/qwmfXL0tWYREcB4wJ3GH3IdH3mixLp1MskcAIP7g.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/1/25/Z6xN9uKS7rCRuxbE63nRbs72UZgt1tGRNV36kFg3.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/14/27/26oMEoNJAiIRCfujKy6tkNiT01a14s9WIk41nBfw.png",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/14/27/gzHwb7xR6xP3QMeKPYlEpYL0XfUlwCGsX0Plyjeb.png",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/14/28/rTKgnXDH6rNWfEQxc7Pq5Ug9Phw0m2mMG6OvF0HX.png",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/14/28/MTR4dkwS4YN1zuzDezUCxL5DyNQ4isk0XuVQipFI.png",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/14/28/5lo681RMbeLN9wZpNPYukXz4PRAs5q92pFXlwEZP.png",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/31/ldoKVEHioOMbqc8IRbfvsUNhFtISv6jCFhnxhFNK.png",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/31/8HObAl9pELajH6q30faOZpC6FpdTqNhr1APjfZVh.png",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/36/geO8lJNQcWjPwDNBeRZU6YLu97mEhnTbEx9dgvew.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/37/JoNHof8lAInCcsQE1JgbybrxXG5gBlNgC1UoyoVS.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/40/TLKMVA6nHGYXuHTOhPZjWg1UHpBMP9zlC62NPW8y.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/41/mJ9lxZDQbzNluB4n32hJCy7zBCnyN9GSkp5bVY9t.png",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/41/zbxJfO068waWAP9i4PpwYdo5aCidZ9hFn3WFf0lv.png",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/42/p2iaCn5O8sKc3j4FCpEwsfWVzJBRnOU5I1uUcYTE.png",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/42/kLtJxrH105qL6ipGzaS5P6T4w19lGopmonogx1CZ.png",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/44/khE9FTeKcEWciR1dfcMZ2qHLLE52ep8ODo01qJGS.png",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/44/AmFHCF03WHFdfAG5xI6MC1Wh3ravI2IgU9NOCeKA.png",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/46/RXkldC7bz9yoYi4iV5FStYyFxH1qNQxD6zXTGikB.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/46/cXmSmj6AWcWk5P9QPEUoPsY8iYac5ByzwU8Y5KHE.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/46/8IDH81AJq3kSybmbe3AGCdNYTgIUbgmDj7mB2q2x.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/46/3GUkQi7zyHjVswzblKuriuj4mAx7aFwh5k7I7e2w.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/54/EY3uTYxq7LoJDEzz7SXsCELUnDExg8mXzwGWcSr9.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/54/85AdJgTibl6k1YQhbLSNygmsQWSbdqwRDTXLcC0k.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/54/Fw758qpOwX3jFadMBLXUrSzGuEOpxBXLcY6PX8VI.png",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/54/X9xyVFyD4rkMD6QDnn9NWnNNLdRMc40Fa1zp8O78.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/55/g3fn5lzWKn3TYv39cGlzlC1tYUJK1fndSIT0ye4l.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/55/uYqy1lAjeTqVGhLqRzdSKee5iFCpGE6Qf9qGlKwR.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/56/jlInfl1apTGa9VaZU1PgEgId6yXYrzlMN5LFxiCB.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/56/SL8DstQ4hvM02Hr9mbJ1k73CE4RnP6MabLfeMAY2.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/56/ZyNZWVI8j8IVw6iY0CtyasZn0KBZgPPMT83MRwm0.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/49/sHrtOvNTi8ZMAhoeOo7yULLLXNLwcA7mjkhkEMtR.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/49/ixeuATiACaY37OVnnpX74RUhynBFm9glPedGbJ5F.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/49/bnvZT24Rsq6POeTDbidIyQuHArHphzEWZ5lsuAE2.png",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/49/OTLwMT4g6Aor3d1b7jGo7L47f9jJwzJ4JI5jrqD4.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/45/delJdkKdMTOCJA2ug7HIjCe3qrTqfjssnoDBedZl.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/45/UgaQwMxEsJfROhj8NvhZ6YBUv5Avo1DnE1NguB7a.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/45/YRu7yRta2W8IWIIDLQNsdoxj0yKaZzlozJa0MHJa.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/46/uvWRW25Y74lhp0cBtHWBXpGFz2SH2gZ0SxnTm9OF.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/45/usxA9155nFbA0BbH8p3iTSUVqBmQ5qlVuqC1RwmG.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/46/MLNqeQ5JiailjzeeajBIsyIgMr4VEWO9bY1vUqkt.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/46/4Sqn9u5TMcAC3WAx2fnbrYBNcZt9fjjzCWWiJgn0.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/46/cO68nXzvqDcxcUCupODlSZOmdU15GYMPZaW8fs54.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/46/ySbpYfZrXB3xwuE8ZTIdhXycybCn4T1togAjQiGZ.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/46/LX59CRwWysoA38HeKxF8fVFzPVGy8cz8FDhir1zZ.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/47/S8aEhE0S7jdT61bOkIe1uT82RtmtXN9nkm39N2az.png",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/29/70/t0YOujqOrwBLe3uOdbWCqFw3LvSHjUdna3MZ5REz.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/29/70/pWqUd3lytUfrYu5AlTx5FgzXM1501YnQNvVzlKks.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/29/70/iSHlzQpX8oVRPule59qz9qo1crwm4CRPRfhNq0qk.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/71/K5N2m8oHp05UrXLyCtys2sgaQUyFuqePOr1XG5XM.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/71/ItOOFAUtEuwx0Uj4nSd3mNKgrKgQ7WJLC5F0aQjt.png",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/71/yuln2nZPhLc1fTVtGxqO2Jc4Ms34EDDqyuRxhJpg.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/69/74yjKICoGCIKYYLZWV5MpquJq3bFjdTo9V34Hd61.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/69/grk9BM4UZPm6HrDFGFfAhUCCG9urq5bXurhhlzd1.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/69/e1N0spz9fyNhK3K2Q1UhAnNLSAkvwVeZgXK3vMJ0.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/69/YQ7yZOoRABXqFRc5SScW6nRpQSkEvXkQAQOe0yMo.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/69/EmXnCbYhCW1pl3aFY9E1b0BV0KTQMJoQHuj9lVCl.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/69/rqDSPpndsp35gIg3FmWHaoO7p6BXDfTeoqhA6csw.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/69/kVuuzO3mJNRAE9MiNDXbcaEbHoW1TLlKgM7DTAW4.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/72/G5JcT6TT9pOnIuLE53YilAVlgqdR5JqSZUVlmA5e.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/72/LQVSojXcXxnt45WCzxgZ5WBzesBAtQyMq0edf5Qj.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/72/wvSrUO1HhKkw2K6W7JdWfFy0X8r4pLE5TgbXjQU1.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/72/xeboVdTHaCu90vmZl5n9m3Z2bW6y1GrtztlOPQEC.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/72/EkJlXv184BPa9WSKCV8KSfECG7bVfyamjhOy7Imd.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/72/p909g7sy4ScACFngh9nKG48xmphvY2sxCppLrr0C.jpeg"
    ];

    $post = Post::all()->random();
    return [
        'is_primary' => $faker->boolean(20),
        'post_id' => $post->id,
        'user_id' => $post->user->id,
        'url' => $faker->randomElement($awsImages),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
