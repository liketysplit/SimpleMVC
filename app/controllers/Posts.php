<?php
  class Posts extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

      $this->postModel = $this->model('Post');
      $this-> userModel = $this->model('User');
    }

    public function index(){
      $posts = $this->postModel->getPosts();

      $data = [
        'posts' => $posts
      ];

      $this->view('posts/index', $data);
    }

    public function add(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'title' => trim($_POST['title']),
          'body' => trim($_POST['body']),
          'user_id' => $_SESSION['user_id'],
          'error_title' => '',
          'error_body' => ''
        ];

        if(empty($data['title'])){
          $data['error_title'] = 'Please enter title!';
        }
        if(empty($data['body'])){
          $data['error_body'] = 'Please enter some text for your post!';
        }
 
        if(empty($data['error_title']) && empty($data['error_body'])){
          if($this->postModel->addPost($data)){
            flash('post_message', 'Posted!');
            redirect('posts');
          } else {
            die('Post Failed: Please contact the Site Administrator.');
          }
        } else {
          $this->view('posts/add', $data);
        }
      } else {
        $data = [
          'title' => '',
          'body' => ''
        ];
  
        $this->view('posts/add', $data);
      }
    }

    public function show($id){
        
        $post = $this->postModel->getPostById($id);
        
        $user = $this->userModel->getUserById($post->user_id);
        
        $data = [
          'post' => $post,
          'user' => $user
        ];
  
        $this->view('posts/show', $data);
      }

  }
