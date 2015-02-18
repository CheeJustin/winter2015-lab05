<?php

class Admin extends Application {

    function __construct()
    {
	parent::__construct();
        $this->load->helper('formfields');
    }

    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    function index()
    {
        $this->data['title'] = "Quotations Maintenance";
        $this->data['quotes'] = $this->quotes->all();
        
	$this->data['pagebody'] = 'admin_list';    // this is the view we want shown
        $this->render();
    }
    
    function add()
    {
        $quote = $this->quotes->create();
        $this->present($quote);
    }
    
    // Present a quotation for adding/editing
    function present($quote)
    {
        $this->data['fid'] = makeTextField('ID#', 'id', $quote->id);
        $this->data['fwho'] = makeTextField('Author', 'who', $quote->who);
        $this->data['fmug'] = makeTextField('Picture', 'mug', $quote->mug);
        $this->data['fwhat'] = makeTextArea('The Quote', 'what', $quote->what);
        
        $this->data['fsubmit'] = makeSubmitButton('Process Quote', "Click here to validate the quotation data", 'btn-success');
        
        $this->data['pagebody'] = 'quote_edit';
        $this->render();
    }
    
    function confirm()
    {
        echo "Completed 5b";
    }

}

/* End of file Welcome.php */
/* Location: application/controllers/Welcome.php */