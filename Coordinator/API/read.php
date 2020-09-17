<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once 'database.php';
    include_oce 'sample.php';

    $database= new Database();
    $db= $database-> connect();

    $post = new Post($db);

    $result=$post->read();
    $num= $result->rowcount();

    if ($num > 0){
        $post_arr = arr();
        $posts_arr['data']= array();

        while($row = $result-> fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $post_item= arr(
                    'tour_id'=>$tour_id ;
                    'name'=> $name;
                    'branch' => $branch;
                    'company_id' => $company_id;
                    'available_days' => $available_days;
                    'place'=> $place;
                    'rate'=> $rate;
                    'description'=> $description;
                    'avg_rating'=> $avg_rating;
            );

            array_push($post_arr['data'], $post_item );
        }
        echo json_encode($posts_arr);

    }else{
        echo json_encode(
            array('message '=> 'No posts found')
        );
    }

    
?>