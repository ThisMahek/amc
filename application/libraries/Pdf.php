<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**


* CodeIgniter PDF Library
 *
 * Generate PDF's in your CodeIgniter applications.
 *
 * @package         CodeIgniter
 * @subpackage      Libraries
 * @category        Libraries
 * @author          Vidya Ganesh Yadav
 * @link            https://github.com/chrisnharvey/CodeIgniter-  PDF-Generator-Library



*/

require_once APPPATH.'third_party/dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;
class Pdf extends DOMPDF
{
/**
 * Get an instance of CodeIgniter
 *
 * @access  protected
 * @return  void
 */
protected function ci()
{
    return get_instance();
}

/**
 * Load a CodeIgniter view into domPDF
 *
 * @access  public
 * @param   string  $view The view to load
 * @param   array   $data The view data
 * @return  void
 */
public function load_view($view, $data = array())
{
    //debug(func_get_args());die();
    $options = new Options();
    $options->set(array('isRemoteEnabled'=> TRUE));
    $dompdf = new Dompdf($options);
    //$dompdf = new Dompdf();
    $time = time();
    $file_name = $time.'.pdf';
    $issaveondir = (isset($data['is_save_on_dir']) && $data['is_save_on_dir'])?true:false;
    if (isset($data['html_content']) && !empty($data['html_content'])) 
    {
       $html = $data['html_content'];
    }
    else
    {
      $html = $this->ci()->load->view($view, $data, TRUE);
    }
    
    if (isset($data['file_name'])) 
    {
        $file_name = $data['file_name'];
    }
    if(isset($data['test']) && $data['test'])
    {
      echo $html;die; 
    } 
    if (isset($data['page_size']) && !empty($data['page_size'])) 
    {
     // echo $data['page_size'];
       $dompdf->set_paper($data['page_size'], 'portrait');
    }
    /*$paper_size = array(0, 0, 612.00, 792.00);
    $dompdf->set_paper($paper_size); */
    $dompdf->load_html($html);
    $dompdf->render();
    if ($issaveondir) 
    {
       $pdf = $dompdf->output();
       $file_location = FCPATH . "/uploads/tempfiles/".$file_name;
       if(!is_dir(FCPATH . "/uploads/tempfiles/"))
       {
         mkdir(FCPATH . "/uploads/tempfiles/",0777);
       }
       $updated = file_put_contents($file_location,$pdf);
       return $updated;
    }
    else
    {
      $dompdf->stream($file_name);
    } 
    // Output the generated PDF to Browser
}
}