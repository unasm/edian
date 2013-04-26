<?php    

/**  

* 生成验证码  

* @author chenzhouyu  

* 类用法  

* $checkcode = new checkcode();  

* $checkcode->doimage();  

* //取得验证  

* $_SESSION['securimage_code_value']=$checkcode->get_code();  

*/  



class Checkcode  extends MY_Controller{  
   //验证码的宽度  
   public $width=130;  
   //验证码的高  
   public $height=50;  
   //设置字体的地址  
   private $font;  
   //设置字体色  
   public $font_color;  
   //设置随机生成因子  
   public $charset = 'abcdefghkmnprstuvwyzABCDEFGHKLMNPRSTUVWYZ23456789';  
   //设置背景色  
   public $background = '#EDF7FF';  
   //生成验证码字符数  
   public $code_len = 4;  
   //字体大小  
   public $font_size = 20;  
   //验证码  
   private $code;  

   //图片内存  
   private $img;  
   //文字X轴开始的地方  
   private $x_start;  
   function __construct() {  
		parent::__construct();
		$this->font = array(
			"a.ttf",
			"b.ttf",
			"c.ttf",
			"d.ttf",
			"e.ttf",
			"f.ttf",
			"g.ttf",
			"h.ttf",
			"h.ttf",
			"k.ttf"
		);  
   }  
   function creat_code() {  
    //* 生成随机验证码。  
       $code = '';  
       $charset_len = strlen($this->charset)-1;  
       for ($i=0; $i<$this->code_len; $i++) {  
           $code .= $this->charset[rand(1, $charset_len)];  
       }  
       $this->code = $code;  
   }  
   public function get_code() {  
    //获取验证码  
       return strtolower($this->code);  
   }  
   /**  
    * 生成图片  
    */  
   public function doimage() {  
       $this->creat_code();  
	   $code = $this->code;
       $this->img = imagecreatetruecolor($this->width, $this->height);  
       if (!$this->font_color) {  
           $this->font_color = imagecolorallocate($this->img, rand(0,156), rand(0,156), rand(0,156));  
       } else {  
           $this->font_color = imagecolorallocate($this->img, hexdec(substr($this->font_color, 1,2)), hexdec(substr($this->font_color, 3,2)), hexdec(substr($this->font_color, 5,2)));  
       }  
       //设置背景色  
       $background = imagecolorallocate($this->img,hexdec(substr($this->background, 1,2)),hexdec(substr($this->background, 3,2)),hexdec(substr($this->background, 5,2)));  
       //画一个柜形，设置背景颜色。  
       imagefilledrectangle($this->img,0, $this->height, $this->width, 0, $background);  
       $this->creat_font();  
       $this->creat_line();  
       $this->output();  
   }  
   /**  
    * 生成文字  
    */  
   private function creat_font() {  
       $x = $this->width/$this->code_len;  
       for ($i=0; $i<$this->code_len; $i++) {  
			$font = "font/".$this->font[rand(0,count($this->font)-1)];
           imagettftext($this->img, $this->font_size, rand(-30,30), $x*$i+rand(0,5), $this->height/1.4, $this->font_color, $font, $this->code[$i]);  
           if($i==0)$this->x_start=$x*$i+5;  
       }  
   }  
   /**  
    * 画线  
		*/  
   private function creat_line() {  
       imagesetthickness($this->img, 3);  
      
	   /*
       if ( rand(0,100) % 2 == 0 ) {  
         $start = rand(0,66);  
         $ypos  = $this->height / 2 - rand(10, 30);  
         $xpos += rand(5, 15);  
       } else {  
         $start = rand(180, 246);  
         $ypos  = $this->height / 2 + rand(10, 30);  
       }  
       $end = $start + rand(75, 110);  
       imagearc($this->img, $xpos, $ypos, $width, $height, $start, $end, $this->font_color);  
       if ( rand(1,75) % 2 == 0 ) {  
         $start = rand(45, 111);  
         $ypos  = $this->height / 2 - rand(10, 30);  
         $xpos += rand(5, 15);  
       } else {  
         $start = rand(200, 250);  
         $ypos  = $this->height / 2 + rand(10, 30);  
       }  
       $end = $start + rand(75, 100);  
	   imagearc($this->img, $this->width * .75, $ypos, $width, $height, $start, $end, $this->font_color);  
	   if ( rand(0,45) % 2 == 0 ) {  
         $start = rand(45, 111);  
         $ypos  = $this->height / 2 - rand(10, 30);  
         $xpos += rand(5, 45);  
       } else {  
         $start = rand(200, 250);  
         $ypos  = $this->height / 2 + rand(10, 30);  
       }  
       $end = $start + rand(75, 100);  
	   imagearc($this->img, $this->width * .75, $ypos, $width, $height, $start, $end, $this->font_color);  ;
	 */
		$from = 0;
		for($i = 0; $i < 4;$i++){
			$width  = $this->width / 2.66 + rand(3, 60);  
			$height = $this->font_size * 2.14+rand(3,60); 
		   if ( rand(0,45) % 2 == 0 ) { 
				$start = rand(0,40);  
		        $ypos  = $this->height / 2 - rand(10, 30);  
	       } else {  
		     $start = rand(200, 250);  
			 $ypos  = $this->height / 2 + rand(10, 30);  
		   }  
			//$ypos = $this->height/2;
			//$ypos = rand(($this->height/3),$this->height/2);
			$end = $start + rand(75, 100);  
			/*
			$red = imagecolorallocate($this->img, 255, 0, 0);
			imagearc($this->img, 30, 30, 40, 40,90,0, $red);
	 */
			//180 10口向下半弧
			//360 190 上半弧度
			//在e 190;确定情况下，s接近190中不断缩小，上半弧度190为园，之后s增大中不断缩小，360为上半弧
	       //imagearc($this->img, $this->width * .75, $ypos, $width, $height, $start, $end, $this->font_color);  
	       imagearc($this->img, $from, $ypos, $width, $height, $start, $end, $this->font_color);  
			$from=(($this->width/4)*$i)+rand(10,30);
	   }
   }  
   /**  

    * 输出图片  

    */  

   private function output() {  
       header("content-type:image/png\r\n");  
       imagepng($this->img);  
       imagedestroy($this->img);  
   }  

}  

/* 

$checkcode = new checkcode();  

$checkcode->doimage();  

//取得验证  

session_start();

$_SESSION['securimage_code_value']=$checkcode->get_code();  ;
 */

//注意：第50行  $this->font = "font/arial.ttf";    需要 指定一个 字体

