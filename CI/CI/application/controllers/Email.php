<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 public function __construct()
	 {
	     parent::__construct();
	     $this->load->library('session');
	     $this->load->library('form_validation');
	     $this->load->library('email');
	     $this->load->database();
	     $config['protocol'] = 'sendmail';
         $config['mailpath'] = '/usr/sbin/sendmail';
         $config['charset'] = 'iso-8859-1';
         $config['wordwrap'] = TRUE;
         $config['mailtype'] = 'html';
         $this->email->initialize($config);
	 }
	 
	 public function return_data()
	 {   
    // 	$url = 'https://c.xkcd.com/random/comic/';
    //     $file = fopen($url, 'r');
    //     $meta_data = stream_get_meta_data($file);
    //     $a = str_replace('Location: http://xkcd.com/', '', $meta_data['wrapper_data'][7]);
    //     $a = str_replace('/', '', $a);
    //     fclose($file);
    // Comments due to fopen in not working properly in my server


     $a = rand(1,2500);
       
        $url = "https://xkcd.com/".$a."/info.0.json";
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);          
        $result = json_decode(curl_exec($ch));
        return $result;
	 }
	 
	public function index()
	{
	    if(!empty($_POST))
	    {
	        $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
	        
	        if($this->form_validation->run() == FALSE)
	        {
	            $this->load->view('index');
	        }
	        else
	        {
	            $rndno=rand(100000, 999999);//OTP generate
                $message = "Your Verify Otp number is.".$rndno;
                $to=$_POST['email'];
                $subject = "OTP VERIFICATION";
                // $txt = "OTP: ".$rndno."";
                // $headers = "From: mohitrawat1000@gmail.com";
                
                $this->email->from('mohitrawat1000@gmail.com', 'Mohit');
                $this->email->to($to);
                $this->email->subject(filter_var($subject, FILTER_SANITIZE_STRING));
                $this->email->message($message);

                if($this->email->send())
                {
                    $this->session->set_userdata(['email'=>$_POST['email'],'otp'=>$rndno]);
                    redirect('email/otp_verify');
                }
	        }
            
	    }
	    else
	    {
		$this->load->view('index');
	    }
	}
	
	public function otp_verify()
	{
	    if($this->session->has_userdata('email') && $this->session->has_userdata('otp'))
	    {
	   // 	echo $this->session->userdata('otp');
	        if(!empty($_POST))
	        {

	        $this->form_validation->set_rules('otpvalue', 'OTP', 'required');
	        
	        if($this->form_validation->run() == FALSE)
	        {
	            $this->load->view('otp');
	        }
	        else
	        {
	            $email =$this->session->userdata('email');
	            $session_otp =$this->session->userdata('otp');

	            $otp = $this->input->post('otpvalue');
	            if(!strcmp($session_otp,$otp) && $session_otp == $otp)
	            {
	            	$data = $this->return_data();
	            
                    $subject = $data->safe_title;
                    $txt =  $data->transcript."<br/>".$data->alt;
                    $txt .=  "<img src='".$data->img."'>";
                    $txt .=  "For Unsubscribe <a href='".base_url('index.php/email/unsubscribe/').$email."'>Click Here</a>";
                    
                     $this->email->from('mohitrawat1000@gmail.com', 'Mohit');
                     $this->email->to($email);
                     $this->email->subject(filter_var($subject, FILTER_SANITIZE_STRING));
                     $this->email->message($txt);

                // $this->email->attach($data->img, 'inline');
                // $this->email->attach($data->img);
                
                    $this->email->send();
                    $this->session->unset_userdata(['email','otp']);
                    $this->db->insert('subscriber',['mail'=>$email]);
                   $this->session->set_flashdata('error',"Thank you!! Please Check Your Email.");
                    redirect('email/index');
	            }
	            else
	            {
	                $this->session->set_flashdata('error',"Invalid OTP!!");
					redirect($_SERVER['HTTP_REFERER']);
	            }
	        }
            
    	    }
    	    else
    	    {
    		$this->load->view('otp');
	        }
	    }
	    else
	    {
	         redirect('email/index');
	    }
	}
	
	public function unsubscribe($email)
	{
	     $this->db->update('subscriber',['status'=>'0'],['mail'=>$this->uri->segment(3)]);
	     echo 'successfully unsubscribed to our mailing list';
	}
}
