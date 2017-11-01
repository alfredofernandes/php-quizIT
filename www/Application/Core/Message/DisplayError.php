<?php
    function DisplayError($message = null)
    {
        $result = array();
        
        if ($message == 'DeleteSuccess') {
            $result['status'] = 'success';
            $result['message'] = 'Record Deleted';

        } elseif ($message == 'DeleteError') {
            $result['status'] = 'danger';
            $result['message'] = 'Error in Deleting Record';

        } elseif ($message == 'InsertSuccess') {
            $result['status'] = 'success';
            $result['message'] = 'Record Inserted';

        } elseif ($message == 'InsertError') {
            $result['status'] = 'danger';
            $result['message'] = 'Error in Inserting Record';

        } elseif ($message == 'EditSuccess') {
            $result['status'] = 'success';
            $result['message'] = 'Record Edited';

        } elseif ($message == 'EditError') {
            $result['status'] = 'danger';
            $result['message'] = 'Error in Editing Record';
        }

        return $result;
    }

    if (isset($_GET['msg'])) 
    {
        $message = displayError($_GET['msg']);
    ?>
        <div class="alert alert-<?php echo $message['status']; ?>" role="alert">
            <strong><?php echo $message['message']; ?></strong>!
        </div>
<?php } ?>
