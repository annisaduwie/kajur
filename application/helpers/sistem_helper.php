 <?php 
function in_access()
{
    $ci=& get_instance();
    if($ci->session->userdata('penjual')){
        redirect('Home/penjual');
    }
}

function no_access()
{
    $ci=& get_instance();
    if(!$ci->session->userdata('penjual')){
        redirect('Awal');
    }
}

function in_access_b()
{
    $ci=& get_instance();
    if($ci->session->userdata('bendahara')){
        redirect('admin');
    }
}

function no_access_b()
{
    $ci=& get_instance();
    if(!$ci->session->userdata('bendahara')){
        redirect('awal');
    }
}
?>