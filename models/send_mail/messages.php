<?php
    require_once 'Mail.php';
    require_once 'Mail/RFC822.php';
    
    function send_email($fname,$address, $to, $from, $subject, $body, $is_body_html = false) {
        if (!valid_email($to)) {
            throw new Exception('This To address is invalid: ' .htmlspecialchars($to));
        }
        if (!valid_email($from)) {
            throw new Exception('This From address is invalid: ' .htmlspecialchars($from));
        }

        $smtp = array();
        // **** You must change the following to match your
        // **** SMTP server and account information.
        $smtp['host'] = 'ssl://smtp.gmail.com';
        $smtp['port'] = 465;
        $smtp['auth'] = true;
        $smtp['username'] = 'nganpham1129@gmail.com';
        $smtp['password'] = 'N123456789N';
        $mailer = Mail::factory('smtp', $smtp);
        if (PEAR::isError($mailer)) {
            throw new Exception('Could not create mailer.');
        }
       // Add the email address to the list of all recipients
        $recipients = array();
        $recipients[] = $to;
        
        // Set the headers
        $headers = array();
        $headers['From'] = $from;//khai báo địa chỉ mail người gửi
        $headers['To'] = $to;//khai báo địa chỉ mail người nhận
        $headers['Subject'] = $subject; // chủ đề của mail
        
        // Khai báo thông tin mail người gửi.
        if ($is_body_html) {
            // Khai báo header dùng mã utf-8 để hiển thị tiếng việt
            $headers['Content-type']  = 'text/html; charset=utf-8' . "\r\n";
        }
        
        //khai báo nội dung thư theo chuẩn HTML
	$message  = '<center><h3 style="color:#ea1a77; font-weight: bold;">CONTACT</h3></center>
                    <div style="text-indent:100px; margin-left:100px;">
                        <p><span style="color:#ea1a77;">- Letter sent from: </span>'.$fname.'</p>
                        <p><span style="color:#ea1a77;">- Email: <span>'.$from.'</p>
                        <p><span style="color:#ea1a77;">- Address: </span>'.$address.'</p>
                        <p><span style="color:#ea1a77;">- Message: </span>'.$body.'</p></div>';
    // Send the email
        $result = $mailer->send($recipients, $headers, $message);
        
        // Check the result and throw an error if one exists
        if (PEAR::isError($result)) {
            throw new Exception('Error sending email: ' .htmlspecialchars($result->getMessage()) );
        }
    }
	
	function send_email2($fname,$address, $phone, $to, $from, $subject, $order_id, $is_body_html = false) {
        if (!valid_email($to)) {
            throw new Exception('This To address is invalid: ' .htmlspecialchars($to));
        }
        if (!valid_email($from)) {
            throw new Exception('This From address is invalid: ' .htmlspecialchars($from));
        }

        $smtp = array();
        // **** You must change the following to match your
        // **** SMTP server and account information.
        $smtp['host'] = 'ssl://smtp.gmail.com';
        $smtp['port'] = 465;
        $smtp['auth'] = true;
        $smtp['username'] = 'nganpham1129@gmail.com';
        $smtp['password'] = 'N123456789N';
        $mailer = Mail::factory('smtp', $smtp);
        if (PEAR::isError($mailer)) {
            throw new Exception('Could not create mailer.');
        }
       // Add the email address to the list of all recipients
        $recipients = array();
        $recipients[] = $to;
        
        // Set the headers
        $headers = array();
        $headers['From'] = $from;//khai báo địa chỉ mail người gửi
        $headers['To'] = $to;//khai báo địa chỉ mail người nhận
        $headers['Subject'] = $subject; // chủ đề của mail
        
        // Khai báo thông tin mail người gửi.
        if ($is_body_html) {
            // Khai báo header dùng mã utf-8 để hiển thị tiếng việt
            $headers['Content-type']  = 'text/html; charset=utf-8' . "\r\n";
        }
        
        //khai báo nội dung thư theo chuẩn HTML
	$message  = '<center><h3 style="color:#ea1a77; font-weight: bold;">ORDER ONLINE</h3></center>
                    <div style="text-indent:100px; margin-left:100px;">
                        <p><span style="color:#ea1a77;">- Letter sent from: </span>'.$fname.'</p>
                        <p><span style="color:#ea1a77;">- Email: <span>'.$from.'</p>
                        <p><span style="color:#ea1a77;">- Address: </span>'.$address.'</p>
						<p><span style="color:#ea1a77;">- Phone: </span>'.$phone.'</p>
                        <p><span style="color:#ea1a77;">- Order_id: </span>'.$order_id.'</p></div>';
    // Send the email
        $result = $mailer->send($recipients, $headers, $message);
        
        // Check the result and throw an error if one exists
        if (PEAR::isError($result)) {
            throw new Exception('Error sending email: ' .htmlspecialchars($result->getMessage()) );
        }
    }
    
    function send_email_forgot($username, $user_email, $pw) {
        $smtp = array();
        // **** You must change the following to match your
        // **** SMTP server and account information.
        $smtp['host'] = 'ssl://smtp.gmail.com';
        $smtp['port'] = 465;
        $smtp['auth'] = true;
        $smtp['username'] = 'nganpham1129@gmail.com';
        $smtp['password'] = 'N123456789N';
        $mailer = Mail::factory('smtp', $smtp);
        if (PEAR::isError($mailer)) {
            throw new Exception('Could not create mailer.');
        }
       // Add the email address to the list of all recipients
        $recipients = array();
        $recipients[] = $user_email;
        
        // Set the headers
        $headers = array();
        $headers['From'] = 'nganpham1129@gmail.com';//khai báo địa chỉ mail người gửi
        $headers['To'] = $user_email;//khai báo địa chỉ mail người nhận
        $headers['Subject'] = 'Confirm Password'; // chủ đề của mail
        
        // Khai báo thông tin mail người gửi.
            $headers['Content-type']  = 'text/html; charset=utf-8' . "\r\n";
        
        //khai báo nội dung thư theo chuẩn HTML
	$message  = '<center><h3 style="color:#ea1a77;">CONFIRM PASSWORD</h3></center>
                    <div style="text-indent:100px; margin-left:100px;">
                        <p>You forgot your password. </p><p> Your new password is:<span style="color:#ea1a77;">'.$pw.'<span></p>
                  <p>Please login with this password and change your password.</p>';
    // Send the email
        $result = $mailer->send($recipients, $headers, $message);
        
        // Check the result and throw an error if one exists
        if (PEAR::isError($result)) {
            throw new Exception('Error sending email: ' .htmlspecialchars($result->getMessage()) );
        }
    }
    
    function valid_email($email) {
        $emailObjects =Mail_RFC822::parseAddressList($email);
        if (PEAR::isError($emailObjects)) return false;
        //Lấy mailbox và host của email đầu tiên
        $mailbox = $emailObjects[0]->mailbox;
        $host = $emailObjects[0]->host;
        //Đảm bảo mailbox và host không quá dài
        if (strlen($mailbox) > 64) return false;
        if (strlen($host) > 255) return false;
        //Xác thực mailbox
        $atom = '[[:alnum:]_!#$%&\'*+\/=?^`{|}~-]+';
        $doatom = '(\.' . $atom . ')*';
        $address = '(^' . $atom . $doatom . '$)';
        $char = '([^\\\\"])';
        $esc = '(\\\\[\\\\"])';
        $text = '(' . $char . '|' . $esc . ')+';
        $quoted = '(^"' . $text . '"$)';
        $localPart = '/' . $address . '|' . $quoted . '/';
        $localMatch = preg_match($localPart, $mailbox);
        if ($localMatch === false || $localMatch != 1) {
            return false;
        }
        //Xác thực host
        $hostname = '([[:alnum:]]([-
        [:alnum:]]{0,62}[[:alnum:]])?)';
        $hostnames = '(' . $hostname . '(\.' . $hostname .')*)';
        $top = '\.[[:alnum:]]{2,6}';
        $domainPart = '/^' . $hostnames . $top . '$/';
        $domainMatch = preg_match($domainPart, $host);
        if ($domainMatch === false || $domainMatch != 1) {
            return false;
        }
            return true;
    }
?>