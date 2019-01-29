<?php
  class Posts extends Controller {
    public function __construct(){
    //This can make posts for only logged in users    
    //   if(!isLoggedIn()){
    //     redirect('users/login');
    //   }

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
      } else if (isset($_SESSION['user_id'])){
        $data = [
          'title' => '',
          'body' => ''
        ];
  
        $this->view('posts/add', $data);
      }else{
        if(!isLoggedIn()){
            redirect('users/login');
        }
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

    public function edit($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
            $data = [
                'id' => $id,
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'error_title' => '',
                'error_body' => ''
            ];
    
            if(empty($data['title'])){
                $data['error_title'] = 'Please enter a title!';
            }
            if(empty($data['body'])){
                $data['error_body'] = 'Please enter some text for your post!';
            }
    
            if(empty($data['error_title']) && empty($data['error_body'])){

                if($this->postModel->updatePost($data)){
                    flash('post_message', 'Post Updated');
                    redirect('posts');
                } else {
                    die('Post Update Failed: Please contact the Site Administrator.');
                }
                } else {
                    $this->view('posts/edit', $data);
                }
    
        } else {
            $post = $this->postModel->getPostById($id);
    
            if($post->user_id != $_SESSION['user_id']){
                redirect('posts');
            }
    
            $data = [
                'id' => $id,
                'title' => $post->title,
                'body' => $post->body
            ];
    
            $this->view('posts/edit', $data);
        }
        }

        public function delete($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

              $post = $this->postModel->getPostById($id);
              
              if($post->user_id != $_SESSION['user_id']){
                redirect('posts');
              }
      
              if($this->postModel->deletePost($id)){
                flash('post_message', 'Post Removed');
                redirect('posts');
              } else {
                die('Post Delete Failed: Please contact the Site Administrator.');
              }
            } else {
              redirect('posts');
            }
          }
      
  }
