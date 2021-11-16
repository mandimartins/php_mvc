<?php

class Posts extends Controller
{

    //I wanna protect the whole posts functionalities.
   // That's why I redirect all accesses except logged in users
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect("users/login");
        }

        $this->postModel = $this->model("Post");
    }

    public function index()
    {
        //Get posts
        $posts = $this->postModel->getPosts();
        $data = [
            "posts" => $posts
        ];
        $this->view("posts/index", $data);
    }

    public function add()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                "title" => trim($_POST["title"]),
                "body" => trim($_POST["body"]),
                "user_id" => trim($_SESSION["user_id"]),
                "title_err" => "",
                "body_err" => ""
            ];

            //Validate title
            if (empty($data["title"])) {
                $data["title_err"] = "Please enter title";
            }
            if (empty($data["body"])) {
                $data["body_err"] = "Please enter body text";
            }

            if (empty($data["title_err"]) && empty($data["body_err"])) {
                if ($this->postModel->addPost($data)) {
                    flash("post_message", "Post Added");
                    redirect("posts");
                } else {
                    die("Something went wrong!");
                }
            } else {
                //Load the view with errors
            }
        } else {
            $data = [
                "title" => "",
                "body" => ""
            ];

            $this->view("posts/add", $data);
        }
    }

    public function show($id)
    {
        $posts = $this->postModel->getPostById($id);

        $data = [];
        $this->view("posts/show", $data);
    }
}
