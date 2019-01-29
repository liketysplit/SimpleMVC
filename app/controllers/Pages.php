<?php
  class Pages extends Controller {
    public function __construct(){
    }
    
    public function index(){
        if(isLoggedIn()){
            // redirect('posts');
        }
        
        $data = [
            'title' => 'Simple',
            'description' => 'Post using a simple framework!'
        ];

      
     
        $this->view('pages/index', $data);
    }

    public function about(){
        $data = [
            'title' => 'About Us',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum congue semper. In sed nunc aliquet, accumsan urna pretium, viverra ex. Maecenas dignissim eros eget ligula lacinia, vulputate semper quam luctus. Curabitur eu tempus diam. Nam euismod sit amet tortor dapibus vestibulum. Mauris vestibulum enim et sem aliquam aliquam. Aenean non erat id lorem sagittis commodo. Aenean porttitor sed mi eget ultrices. Duis fringilla massa quis purus ullamcorper tristique. Aliquam erat volutpat. Nunc urna leo, convallis sit amet odio in, malesuada porttitor massa.
            <br><br>
            Cras at ante eu ex lacinia dignissim nec et risus. Sed lobortis semper lorem eu consequat. Donec ac nunc maximus, fringilla orci eget, feugiat sem. In eget lacus lobortis, suscipit neque et, consequat arcu. Sed cursus sollicitudin neque, a maximus orci aliquet euismod. Quisque vitae sodales nunc. Integer elit diam, semper in felis quis, vestibulum dictum lectus.
            <br><br>
            Vivamus elementum consectetur malesuada. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin placerat ante sit amet nibh tristique feugiat. Vestibulum tempor dui non lorem pulvinar, eget pharetra nisi volutpat. Aliquam id maximus diam. Donec sodales est et euismod iaculis. Duis vitae nisi vitae justo tristique finibus ut et massa. Mauris efficitur magna et lacinia efficitur.
            <br>
            Vivamus congue elit felis, et tincidunt neque lacinia quis. Aliquam euismod mollis ipsum ut mollis. Nullam iaculis vehicula leo, ut ornare mauris. Donec suscipit tortor eget arcu interdum, in porttitor libero laoreet. Donec aliquam mollis mauris vitae convallis. Nullam vestibulum dolor non imperdiet convallis. Nullam tincidunt laoreet ipsum, tempus tincidunt enim porttitor a. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla condimentum eget ante in imperdiet. Maecenas non massa ipsum.
            <br><br>
            Proin at tincidunt sapien, vel malesuada arcu. Aliquam finibus massa ut orci scelerisque, ut varius nisl euismod. Cras eleifend, nulla vel faucibus lacinia, leo est pretium ipsum, sit amet fermentum erat elit eu ex. Aenean lobortis turpis turpis, interdum vulputate ex elementum et. Duis eros libero, elementum non magna a, efficitur iaculis ante. Maecenas tempor risus turpis, vitae fringilla lacus placerat in. Integer id sagittis massa. Vestibulum ac turpis nec enim sodales vehicula. Nulla eget justo velit. Nam pretium tellus diam, et congue magna fringilla id. Mauris rhoncus enim et quam ornare, nec dapibus neque eleifend. Proin nec dictum metus, sit amet tincidunt est.'
        ];

        $this->view('pages/about', $data);
    }
  }
