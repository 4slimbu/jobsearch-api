<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('comments')->delete();
        
        \DB::table('comments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 14,
                'parent_id' => NULL,
                'post_id' => 25,
                'comment_body' => 'this is some test test comment updated for John doe\'s post',
                'created_at' => '2019-02-16 07:42:52',
                'updated_at' => '2019-02-16 07:44:31',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 14,
                'parent_id' => NULL,
                'post_id' => 25,
                'comment_body' => 'this is some test test comment for John doe\'s post',
                'created_at' => '2019-02-16 07:44:42',
                'updated_at' => '2019-02-16 07:44:42',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 16,
                'parent_id' => NULL,
                'post_id' => 25,
                'comment_body' => 'this is some test test comment for John doe\'s post',
                'created_at' => '2019-02-16 07:44:43',
                'updated_at' => '2019-02-16 07:44:43',
            ),
            3 => 
            array (
                'id' => 5,
                'user_id' => 11,
                'parent_id' => NULL,
                'post_id' => 1,
                'comment_body' => 'this is some test test comment for John doe\'s post',
                'created_at' => '2019-04-19 11:44:29',
                'updated_at' => '2019-04-19 11:44:29',
            ),
            4 => 
            array (
                'id' => 6,
                'user_id' => 1,
                'parent_id' => 1,
                'post_id' => 25,
                'comment_body' => 'this is a reply',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 7,
                'user_id' => 1,
                'parent_id' => 2,
                'post_id' => 25,
                'comment_body' => 'reply',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 8,
                'user_id' => 14,
                'parent_id' => NULL,
                'post_id' => 1,
                'comment_body' => 'Hello I want to apply for the job',
                'created_at' => '2019-04-29 02:07:02',
                'updated_at' => '2019-04-29 02:07:02',
            ),
            7 => 
            array (
                'id' => 9,
                'user_id' => 14,
                'parent_id' => NULL,
                'post_id' => 1,
                'comment_body' => 'Sure leave your phone no and email. We will contact you soon.',
                'created_at' => '2019-04-29 02:08:23',
                'updated_at' => '2019-04-29 02:08:23',
            ),
            8 => 
            array (
                'id' => 10,
                'user_id' => 14,
                'parent_id' => NULL,
                'post_id' => 1,
                'comment_body' => 'Sure leave your phone no and email. We will contact you soon.',
                'created_at' => '2019-04-29 11:32:44',
                'updated_at' => '2019-04-29 11:32:44',
            ),
            9 => 
            array (
                'id' => 11,
                'user_id' => 14,
                'parent_id' => NULL,
                'post_id' => 1,
                'comment_body' => 'Sure leave your phone no and email. We will contact you soon.',
                'created_at' => '2019-04-29 13:10:09',
                'updated_at' => '2019-04-29 13:10:09',
            ),
            10 => 
            array (
                'id' => 12,
                'user_id' => 14,
                'parent_id' => NULL,
                'post_id' => 22,
                'comment_body' => 'asdfsasdfasdf',
                'created_at' => '2019-04-29 14:55:46',
                'updated_at' => '2019-04-29 14:55:46',
            ),
            11 => 
            array (
                'id' => 13,
                'user_id' => 14,
                'parent_id' => NULL,
                'post_id' => 22,
                'comment_body' => 'I want to apply for this job',
                'created_at' => '2019-04-29 14:57:55',
                'updated_at' => '2019-04-29 14:57:55',
            ),
            12 => 
            array (
                'id' => 14,
                'user_id' => 14,
                'parent_id' => NULL,
                'post_id' => 22,
                'comment_body' => 'sdkjfsdl sdlfksjd flksd',
                'created_at' => '2019-04-29 15:02:32',
                'updated_at' => '2019-04-29 15:02:32',
            ),
            13 => 
            array (
                'id' => 15,
                'user_id' => 14,
                'parent_id' => NULL,
                'post_id' => 22,
                'comment_body' => 'aslkdfj laskf sdflk asdlfk',
                'created_at' => '2019-04-29 15:02:41',
                'updated_at' => '2019-04-29 15:02:41',
            ),
            14 => 
            array (
                'id' => 16,
                'user_id' => 14,
                'parent_id' => NULL,
                'post_id' => 22,
                'comment_body' => 'jasdfklsd alskdfj sdlksda fsaldf sdklf sd',
                'created_at' => '2019-04-29 15:02:52',
                'updated_at' => '2019-04-29 15:02:52',
            ),
            15 => 
            array (
                'id' => 17,
                'user_id' => 14,
                'parent_id' => NULL,
                'post_id' => 22,
                'comment_body' => ', so I can see',
                'created_at' => '2019-04-29 15:17:59',
                'updated_at' => '2019-04-29 15:17:59',
            ),
            16 => 
            array (
                'id' => 18,
                'user_id' => 14,
                'parent_id' => NULL,
                'post_id' => 22,
                'comment_body' => 'hello how  are you',
                'created_at' => '2019-04-29 15:23:21',
                'updated_at' => '2019-04-29 15:23:21',
            ),
            17 => 
            array (
                'id' => 19,
                'user_id' => 14,
                'parent_id' => NULL,
                'post_id' => 25,
                'comment_body' => 'Another question',
                'created_at' => '2019-04-29 15:24:33',
                'updated_at' => '2019-04-29 15:24:33',
            ),
            18 => 
            array (
                'id' => 20,
                'user_id' => 14,
                'parent_id' => NULL,
                'post_id' => 27,
                'comment_body' => 'sd sdfsdf sadfsd',
                'created_at' => '2019-04-29 16:58:21',
                'updated_at' => '2019-04-29 16:58:21',
            ),
            19 => 
            array (
                'id' => 21,
                'user_id' => 14,
                'parent_id' => NULL,
                'post_id' => 21,
                'comment_body' => 'ddfgd dsfg sadf',
                'created_at' => '2019-04-29 17:01:11',
                'updated_at' => '2019-04-29 17:01:11',
            ),
            20 => 
            array (
                'id' => 22,
                'user_id' => 14,
                'parent_id' => NULL,
                'post_id' => 21,
                'comment_body' => 'This ASDF sdf asdf',
                'created_at' => '2019-04-29 17:01:24',
                'updated_at' => '2019-04-29 17:01:24',
            ),
            21 => 
            array (
                'id' => 23,
                'user_id' => 14,
                'parent_id' => NULL,
                'post_id' => 23,
                'comment_body' => 'hello',
                'created_at' => '2019-04-30 01:38:09',
                'updated_at' => '2019-04-30 01:38:09',
            ),
            22 => 
            array (
                'id' => 24,
                'user_id' => 14,
                'parent_id' => NULL,
                'post_id' => 27,
                'comment_body' => 'hello',
                'created_at' => '2019-04-30 02:49:33',
                'updated_at' => '2019-04-30 02:49:33',
            ),
            23 => 
            array (
                'id' => 25,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 29,
                'comment_body' => 'hello how are you',
                'created_at' => '2019-05-03 16:19:24',
                'updated_at' => '2019-05-03 16:19:24',
            ),
            24 => 
            array (
                'id' => 26,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 29,
                'comment_body' => 'fasdfsadf',
                'created_at' => '2019-05-04 04:11:34',
                'updated_at' => '2019-05-04 04:11:34',
            ),
            25 => 
            array (
                'id' => 27,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 22,
                'comment_body' => 'Dg',
                'created_at' => '2019-05-05 21:51:25',
                'updated_at' => '2019-05-05 21:51:25',
            ),
            26 => 
            array (
                'id' => 28,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 22,
                'comment_body' => 'tes',
                'created_at' => '2019-05-07 04:09:14',
                'updated_at' => '2019-05-07 04:09:14',
            ),
            27 => 
            array (
                'id' => 29,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 22,
                'comment_body' => 'test',
                'created_at' => '2019-05-09 12:38:46',
                'updated_at' => '2019-05-09 12:38:46',
            ),
            28 => 
            array (
                'id' => 30,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 30,
                'comment_body' => 'hello',
                'created_at' => '2019-05-09 14:11:19',
                'updated_at' => '2019-05-09 14:11:19',
            ),
            29 => 
            array (
                'id' => 31,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 69,
                'comment_body' => 'hello this is my comment',
                'created_at' => '2019-05-14 18:02:58',
                'updated_at' => '2019-05-14 18:02:58',
            ),
            30 => 
            array (
                'id' => 32,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 69,
                'comment_body' => 'Hello this is my reply',
                'created_at' => '2019-05-14 18:03:18',
                'updated_at' => '2019-05-14 18:03:18',
            ),
            31 => 
            array (
                'id' => 33,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 45,
                'comment_body' => 'hello',
                'created_at' => '2019-05-14 18:31:22',
                'updated_at' => '2019-05-14 18:31:22',
            ),
            32 => 
            array (
                'id' => 34,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 69,
                'comment_body' => 'Rehg',
                'created_at' => '2019-05-14 18:54:53',
                'updated_at' => '2019-05-14 18:54:53',
            ),
            33 => 
            array (
                'id' => 35,
                'user_id' => 29,
                'parent_id' => NULL,
                'post_id' => 69,
                'comment_body' => 'Hello I am interested need of a room. Please mention the price',
                'created_at' => '2019-05-14 18:57:01',
                'updated_at' => '2019-05-14 18:57:01',
            ),
            34 => 
            array (
                'id' => 36,
                'user_id' => 29,
                'parent_id' => NULL,
                'post_id' => 68,
                'comment_body' => 'John what is the time right now?',
                'created_at' => '2019-05-14 18:57:26',
                'updated_at' => '2019-05-14 18:57:26',
            ),
            35 => 
            array (
                'id' => 37,
                'user_id' => 29,
                'parent_id' => NULL,
                'post_id' => 68,
                'comment_body' => 'Are you sure that this will work?',
                'created_at' => '2019-05-14 18:57:50',
                'updated_at' => '2019-05-14 18:57:50',
            ),
            36 => 
            array (
                'id' => 38,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 69,
                'comment_body' => 'hello how are you',
                'created_at' => '2019-05-14 18:58:52',
                'updated_at' => '2019-05-14 18:58:52',
            ),
            37 => 
            array (
                'id' => 39,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 69,
                'comment_body' => 'h',
                'created_at' => '2019-05-14 20:05:48',
                'updated_at' => '2019-05-14 20:05:48',
            ),
            38 => 
            array (
                'id' => 40,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 69,
                'comment_body' => 'hello',
                'created_at' => '2019-05-14 20:05:49',
                'updated_at' => '2019-05-14 20:05:49',
            ),
            39 => 
            array (
                'id' => 41,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 69,
                'comment_body' => 'hello a',
                'created_at' => '2019-05-14 20:05:50',
                'updated_at' => '2019-05-14 20:05:50',
            ),
            40 => 
            array (
                'id' => 42,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 69,
                'comment_body' => 'this',
                'created_at' => '2019-05-14 20:05:51',
                'updated_at' => '2019-05-14 20:05:51',
            ),
            41 => 
            array (
                'id' => 43,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 69,
                'comment_body' => 'th',
                'created_at' => '2019-05-14 20:05:52',
                'updated_at' => '2019-05-14 20:05:52',
            ),
            42 => 
            array (
                'id' => 44,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 69,
                'comment_body' => 'h',
                'created_at' => '2019-05-14 20:05:53',
                'updated_at' => '2019-05-14 20:05:53',
            ),
            43 => 
            array (
                'id' => 45,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 69,
                'comment_body' => 'hello',
                'created_at' => '2019-05-14 20:05:53',
                'updated_at' => '2019-05-14 20:05:53',
            ),
            44 => 
            array (
                'id' => 46,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 69,
                'comment_body' => 'hello this is',
                'created_at' => '2019-05-14 20:05:54',
                'updated_at' => '2019-05-14 20:05:54',
            ),
            45 => 
            array (
                'id' => 47,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 69,
                'comment_body' => 'hello this is a rep',
                'created_at' => '2019-05-14 20:05:55',
                'updated_at' => '2019-05-14 20:05:55',
            ),
            46 => 
            array (
                'id' => 48,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 69,
                'comment_body' => 'hello this is a reply',
                'created_at' => '2019-05-14 20:05:56',
                'updated_at' => '2019-05-14 20:05:56',
            ),
            47 => 
            array (
                'id' => 49,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 69,
                'comment_body' => 'h',
                'created_at' => '2019-05-14 20:06:02',
                'updated_at' => '2019-05-14 20:06:02',
            ),
            48 => 
            array (
                'id' => 50,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 69,
                'comment_body' => 'hell',
                'created_at' => '2019-05-14 20:06:02',
                'updated_at' => '2019-05-14 20:06:02',
            ),
            49 => 
            array (
                'id' => 51,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 69,
                'comment_body' => 'hello thi',
                'created_at' => '2019-05-14 20:06:03',
                'updated_at' => '2019-05-14 20:06:03',
            ),
            50 => 
            array (
                'id' => 52,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 69,
                'comment_body' => 'hello this is',
                'created_at' => '2019-05-14 20:06:04',
                'updated_at' => '2019-05-14 20:06:04',
            ),
            51 => 
            array (
                'id' => 53,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 69,
                'comment_body' => 'hello this is a re',
                'created_at' => '2019-05-14 20:06:05',
                'updated_at' => '2019-05-14 20:06:05',
            ),
            52 => 
            array (
                'id' => 54,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 69,
                'comment_body' => 'hello this is a reply',
                'created_at' => '2019-05-14 20:06:05',
                'updated_at' => '2019-05-14 20:06:05',
            ),
            53 => 
            array (
                'id' => 55,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 69,
                'comment_body' => 'hello',
                'created_at' => '2019-05-14 20:09:49',
                'updated_at' => '2019-05-14 20:09:49',
            ),
            54 => 
            array (
                'id' => 56,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 69,
                'comment_body' => 'reply to her comment',
                'created_at' => '2019-05-14 20:10:22',
                'updated_at' => '2019-05-14 20:10:22',
            ),
            55 => 
            array (
                'id' => 57,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 1,
                'comment_body' => 'this is some test test comment for John doe\'s post',
                'created_at' => '2019-05-14 20:12:56',
                'updated_at' => '2019-05-14 20:12:56',
            ),
            56 => 
            array (
                'id' => 58,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 1,
                'comment_body' => 'this is some test test comment for John doe\'s post',
                'created_at' => '2019-05-14 20:13:22',
                'updated_at' => '2019-05-14 20:13:22',
            ),
            57 => 
            array (
                'id' => 59,
                'user_id' => 28,
                'parent_id' => 57,
                'post_id' => 1,
                'comment_body' => 'this is some test test comment for John doe\'s post',
                'created_at' => '2019-05-14 20:14:09',
                'updated_at' => '2019-05-14 20:14:09',
            ),
            58 => 
            array (
                'id' => 60,
                'user_id' => 28,
                'parent_id' => 56,
                'post_id' => 69,
                'comment_body' => 'testing reply',
                'created_at' => '2019-05-14 20:14:52',
                'updated_at' => '2019-05-14 20:14:52',
            ),
            59 => 
            array (
                'id' => 61,
                'user_id' => 28,
                'parent_id' => 36,
                'post_id' => 68,
                'comment_body' => 'hello this is a reply',
                'created_at' => '2019-05-14 20:27:23',
                'updated_at' => '2019-05-14 20:27:23',
            ),
            60 => 
            array (
                'id' => 62,
                'user_id' => 28,
                'parent_id' => 37,
                'post_id' => 68,
                'comment_body' => 'this is also a reply',
                'created_at' => '2019-05-14 20:27:39',
                'updated_at' => '2019-05-14 20:27:39',
            ),
            61 => 
            array (
                'id' => 63,
                'user_id' => 28,
                'parent_id' => 37,
                'post_id' => 68,
                'comment_body' => 'this is reply to reply',
                'created_at' => '2019-05-14 20:30:08',
                'updated_at' => '2019-05-14 20:30:08',
            ),
            62 => 
            array (
                'id' => 64,
                'user_id' => 28,
                'parent_id' => 55,
                'post_id' => 69,
                'comment_body' => 'reply of hello',
                'created_at' => '2019-05-14 20:57:38',
                'updated_at' => '2019-05-14 20:57:38',
            ),
            63 => 
            array (
                'id' => 65,
                'user_id' => 28,
                'parent_id' => 56,
                'post_id' => 69,
                'comment_body' => 'reply of sub testing reply',
                'created_at' => '2019-05-14 20:57:51',
                'updated_at' => '2019-05-14 20:57:51',
            ),
            64 => 
            array (
                'id' => 66,
                'user_id' => 28,
                'parent_id' => 56,
                'post_id' => 69,
                'comment_body' => 'another reply',
                'created_at' => '2019-05-14 20:58:30',
                'updated_at' => '2019-05-14 20:58:30',
            ),
            65 => 
            array (
                'id' => 67,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 69,
                'comment_body' => 'leave a comment',
                'created_at' => '2019-05-14 21:02:56',
                'updated_at' => '2019-05-14 21:02:56',
            ),
            66 => 
            array (
                'id' => 68,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 68,
                'comment_body' => 'tcesttest',
                'created_at' => '2019-05-14 21:04:36',
                'updated_at' => '2019-05-14 21:04:36',
            ),
            67 => 
            array (
                'id' => 69,
                'user_id' => 28,
                'parent_id' => 68,
                'post_id' => 68,
                'comment_body' => 'replay',
                'created_at' => '2019-05-14 21:13:54',
                'updated_at' => '2019-05-14 21:13:54',
            ),
            68 => 
            array (
                'id' => 70,
                'user_id' => 28,
                'parent_id' => 68,
                'post_id' => 68,
                'comment_body' => 're',
                'created_at' => '2019-05-14 21:16:59',
                'updated_at' => '2019-05-14 21:16:59',
            ),
            69 => 
            array (
                'id' => 71,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 68,
                'comment_body' => 'rere',
                'created_at' => '2019-05-14 21:18:17',
                'updated_at' => '2019-05-14 21:18:17',
            ),
            70 => 
            array (
                'id' => 72,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 68,
                'comment_body' => 'Ggg',
                'created_at' => '2019-05-14 21:20:21',
                'updated_at' => '2019-05-14 21:20:21',
            ),
            71 => 
            array (
                'id' => 73,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 68,
                'comment_body' => 'T',
                'created_at' => '2019-05-14 21:27:47',
                'updated_at' => '2019-05-14 21:27:47',
            ),
            72 => 
            array (
                'id' => 74,
                'user_id' => 28,
                'parent_id' => 73,
                'post_id' => 68,
                'comment_body' => 'Rep',
                'created_at' => '2019-05-14 21:27:58',
                'updated_at' => '2019-05-14 21:27:58',
            ),
            73 => 
            array (
                'id' => 75,
                'user_id' => 28,
                'parent_id' => 32,
                'post_id' => 69,
                'comment_body' => 'Ygg',
                'created_at' => '2019-05-14 21:28:48',
                'updated_at' => '2019-05-14 21:28:48',
            ),
            74 => 
            array (
                'id' => 76,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 23,
                'comment_body' => 'T',
                'created_at' => '2019-05-14 21:29:42',
                'updated_at' => '2019-05-14 21:29:42',
            ),
            75 => 
            array (
                'id' => 77,
                'user_id' => 28,
                'parent_id' => 76,
                'post_id' => 23,
                'comment_body' => 'Gf',
                'created_at' => '2019-05-14 21:29:51',
                'updated_at' => '2019-05-14 21:29:51',
            ),
            76 => 
            array (
                'id' => 78,
                'user_id' => 28,
                'parent_id' => 36,
                'post_id' => 68,
                'comment_body' => 'Tejj',
                'created_at' => '2019-05-14 21:33:58',
                'updated_at' => '2019-05-14 21:33:58',
            ),
            77 => 
            array (
                'id' => 79,
                'user_id' => 28,
                'parent_id' => 36,
                'post_id' => 68,
                'comment_body' => 'Tyy',
                'created_at' => '2019-05-14 21:35:27',
                'updated_at' => '2019-05-14 21:35:27',
            ),
            78 => 
            array (
                'id' => 80,
                'user_id' => 28,
                'parent_id' => 73,
                'post_id' => 68,
                'comment_body' => 'sdfsdfs',
                'created_at' => '2019-05-14 21:35:39',
                'updated_at' => '2019-05-14 21:35:39',
            ),
            79 => 
            array (
                'id' => 81,
                'user_id' => 28,
                'parent_id' => 73,
                'post_id' => 68,
                'comment_body' => 'sdfsd',
                'created_at' => '2019-05-14 21:36:28',
                'updated_at' => '2019-05-14 21:36:28',
            ),
            80 => 
            array (
                'id' => 82,
                'user_id' => 28,
                'parent_id' => NULL,
                'post_id' => 72,
                'comment_body' => 'sadfsdaf',
                'created_at' => '2019-06-13 17:11:06',
                'updated_at' => '2019-06-13 17:11:06',
            ),
        ));
        
        
    }
}