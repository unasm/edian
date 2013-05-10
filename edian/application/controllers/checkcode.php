<?php    

/**  
* 生成验证码  
* $_SESSION['securimage_code_value']=$checkcode->get_code();  
*/  
class Checkcode  extends MY_Controller{  
   //验证码的宽度  
   public $width=130;  
   //验证码的高  
   public $height=40;  
   //设置字体的地址  
   private $font;  
   //设置字体色  
   public $font_color;  
   //设置随机生成因子  
   public $charset = 'abcdefghkmnprstuvwyzABCDEFGHKLMNPRSTUVWYZ123456789';  
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
       header("Cache-Control: no-cache\r\n");  
		$this->font = array(
			"a.ttf",
			"b.ttf",
			"c.ttf",
			"d.ttf",
			"e.ttf",
			"f.ttf",
			"g.ttf",
			"h.ttf",
			"i.ttf",
			"j.ttf",
			"k.ttf",
			"l.ttf",
			"m.ttf",
			"n.ttf"
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
	   $_SESSION["imgCheckCode"] = $code;
   }  
   public function index() {  
    //* 生成图片  
       $this->creat_code();  
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
    */  
   private function creat_font() {  
    //生成文字  
       $x = ($this->width-10)/$this->code_len;  
		$font = "font/".$this->font[rand(0,count($this->font)-1)];//随机字体
       for ($i=0; $i<$this->code_len; $i++) {  
		   if(rand(0,29) % 2)
			$this->font_color = imagecolorallocate($this->img, rand(0,156), rand(0,156), rand(0,156));  
           imagettftext($this->img, $this->font_size, rand(-30,30), $x*$i+rand(5,10), $this->height/1.5+rand(0,10), $this->font_color, $font, $this->code[$i]);  
           //if($i==0)$this->x_start=$x*$i+5;  
       }  
   }  
   /**  
    * 画线  
		*/  
   private function creat_line() {  
       imagesetthickness($this->img, 3);  
		$from = 0;
		for($i = 0; $i < 4;$i++){
			$width  = $this->width / 2.66 + rand(3, 60);  
			$height = $this->font_size * 2.14+rand(3,60); 
		   if ( rand(0,45) % 2 == 0 ) { 
				$start = rand(0,40);  
				$this->font_color = imagecolorallocate($this->img, rand(0,356), rand(0,356), rand(0,356));  
		        $ypos  = $this->height / 2 - rand(10, 30);  
	       } else {  
		     $start = rand(200, 250);  
			 $ypos  = $this->height / 2 + rand(10, 30);  
		   }  
			$end = $start + rand(75, 100);  
	       imagearc($this->img, $from, $ypos, $width, $height, $start, $end, $this->font_color);  
			$from=(($this->width/4)*$i)+rand(10,30);
	   }
   }  
   private function output() {  
    //* 输出图片  
       header("content-type: image/png\r\n");  
       header("Cache-Control: no-cache\r\n");  
       imagepng($this->img);  
       imagedestroy($this->img);  
   }  
	public function check($code)
	{//ajax检验验证码
	   if(strtolower(trim($code))==(strtolower($_SESSION["imgCheckCode"]))){
			echo 1;
	   }else echo 0;
	}

}  
//注意：第50行  $this->font = "font/arial.ttf";    需要 指定一个 字体

