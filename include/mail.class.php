
<?php
/**
 * �����ʼ����ļ�
 * ============================================================================
 * ��Ȩ���� (C) 2010 WWW.SONGDEWEI.COM All Rights Reserved��
 * ��վ��ַ: http://www.songdewei.com
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0���԰�
 * ---------------------------------------------
 * $Date: 2010-08-11
 * $Id: mail.class.php
*/ 
/******************************************************************************* 
    ��������            Email
    ������    ������������������͵����ʼ���;�� 
            
�ɱ��÷��͵��ʼ������ǣ�һ���ı�����HTML��ʶ���ı����������ǣ��Լ��ʼ��������ʼ�ģ�塣
*******************************************************************************/ 
/******************************************************************************* 
    �����б�: 
        setTo($inAddress) 
        setCC($inAddress) 
        setBCC($inAddress) 
        setFrom($inAddress) 
        setSubject($inSubject) 
        setText($inText) 
        setHTML($inHTML) 
        setAttachments($inAttachments) 
        checkEmail($inAddress) 
        loadTemplate($inFileLocation,$inHash,$inFormat) 
        getRandomBoundary($offset) 
        getContentType() 
        formatTextHeader() 
        formatHTMLHeader() 
        formatAttachmentHeader($inFileLocation) 
        send() 
*******************************************************************************/ 

class Email 
{ 
     //---ȫ�ֱ���
    var $mailTo             = "";                      // �ʼ�Ŀ�ĵ�ַ����
    var $mailCC             = "";                      // �����˵�ַ 
    var $mailBCC            = "";                     // �����˵�ַ
    var $mailFrom           = "";                    // �����˵�ַ
    var $mailSubject        = "";                 // �ʼ�����
    var $mailText           = "";                // ���ı���Ϣ
    var $mailHTML           = "";               // html �ı���Ϣ
    var $mailAttachments    = "";             // �������� 

    function Email($mailto,$mailfrom,$mailsubject,$mailcontent){
    	$this->mailTo = $mailto;
    	$this->mailFrom = $mailfrom;
    	$this->mailSubject = $mailsubject;
    	$this->mailHTML = $mailcontent;
    	$this->send();
    }
/******************************************************************************* 
    ������        setTo($inAddress) 
    ������        ���õ����ʼ���ַ
    ������        $inAddress �� string ����
                           �����ŰѸ����ʼ���ַ�������
    ����ֵ��        ����ɹ��򷵻�true  
*******************************************************************************/ 
    function setTo($inAddress){ 
         //--�ѷֺ����ָ��������ʼ���ַ 
        $addressArray = explode( ";",$inAddress); 
         //--���ÿһ���ʼ���ַ�����û�д�����˳���
        for($i=0;$i<count($addressArray);$i++){ 
            if($this->checkEmail($addressArray[$i])==false) return false; 
        } 
         //--������е��ʼ���ַ����ȷ����ô����implode���ʼ���ַ�ָ� 
        $this->mailTo = implode($addressArray, ","); 
        return true; 
    } 
/******************************************************************************* 
    ������        setCC($inAddress) 
    �����������ʼ��ĳ��͵�ַ
    ������        $inAddress ��String�� 
                    �����ŰѸ����ʼ���ַ�������
    ����ֵ��        ����ɹ��򷵻�true  
*******************************************************************************/ 
    function setCC($inAddress){ 
        
        $addressArray = explode( ",",$inAddress); 
        
        for($i=0;$i<count($addressArray);$i++){ 
            if($this->checkEmail($addressArray[$i])==false) return false; 
        } 
        
        $this->mailCC = implode($addressArray, ","); 
        return true; 
    } 
/******************************************************************************* 
    ������        setBCC($inAddress) 
    ������    ���ð����ʼ���ַ
    ������        $inAddress ��String�� 
                    �����ŰѸ����ʼ���ַ�������
    ����ֵ��        ����ɹ��򷵻�true  
*******************************************************************************/ 
    function setBCC($inAddress){ 
        
        $addressArray = explode( ",",$inAddress); 
        
        for($i=0;$i<count($addressArray);$i++){ 
            if($this->checkEmail($addressArray[$i])==false) return false; 
        } 
        
        $this->mailBCC = implode($addressArray, ","); 
        return true; 
    } 
/******************************************************************************* 
    ������        setFrom($inAddress) 
    ������    �����ʼ������˵�ַ
    ������        $inAddress �� string �� (ֻ��һ���ʼ���ַ) 
    ����ֵ������ɹ��򷵻�true
*******************************************************************************/ 
    function setFrom($inAddress){ 
        if($this->checkEmail($inAddress)){ 
            $this->mailFrom = $inAddress; 
            return true; 
        } 
        return false; 
    } 
/******************************************************************************* 
    ������        setSubject($inSubject) 
    ������    �����ʼ�����
    ������$inSubject �� string ����
    ����ֵ������ɹ��򷵻�true
*******************************************************************************/ 
    function setSubject($inSubject){ 
        if(strlen(trim($inSubject)) > 0){ 
            $this->mailSubject = ereg_replace( "\n", "",$inSubject); 
            return true; 
        } 
        return false; 
    } 
/******************************************************************************* 
    ������        setText($inText) 
    �����������ʼ����ı�����
    ������        $inText �� string ���� 
    ����ֵ������ɹ��򷵻�true
*******************************************************************************/ 
    function setText($inText){ 
        if(strlen(trim($inText)) > 0){ 
            $this->mailText = $inText; 
            return true; 
        } 
        return false; 
    } 
/******************************************************************************* 
    ������        setHTML($inHTML) 
    �����������ʼ�HTML�ı�����
    ������        $inHTML �� string ���� 
    ����ֵ������ɹ��򷵻�true
*******************************************************************************/ 
    function setHTML($inHTML){ 
        if(strlen(trim($inHTML)) > 0){ 
            $this->mailHTML = $inHTML; 
            return true; 
        } 
        return false; 
    } 
/******************************************************************************* 
    ������        setAttachments($inAttachments) 
    ������    ���������ַ��� 
    ������        $inAttachments ��һ��������Ŀ¼��Ϣ��String����
                    �Զ���Ϊ�ָ���
    ����ֵ������ɹ��򷵻�true
*******************************************************************************/ 
    function setAttachments($inAttachments){ 
        if(strlen(trim($inAttachments)) > 0){ 
            $this->mailAttachments = $inAttachments; 
            return true; 
        }         
        return false; 
    } 
/******************************************************************************* 
    ������        checkEmail($inAddress) 
    ����������ʼ���ַ�Ƿ��Ϸ�
    ������$inAddress �� string ����
    ����ֵ������Ϸ��򷵻�true
*******************************************************************************/ 
    function checkEmail($inAddress){ 
        return (ereg(  "^[^@ ]+@([a-zA-Z0-9\-]+\.)+([a-zA-Z0-9\-]{2}|net|com|gov|mil|org|edu|int)\$",$inAddress)); 
    } 
/******************************************************************************* 
    ������        loadTemplate($inFileLocation,$inHash,$inFormat) 
    ������    ��ȡһ��ģ���ļ����滻һЩ�궨���ֵ
    ������$inFileLocation �� string ���ͣ���¼Ŀ¼��Ϣ
                    $inHash �� Hash ���ͣ���Ҫ�������ֵ 
                    $inFormat �� string ���ͣ������� "text" �� "html" 
    ����ֵ�������load�򷵻�true
*******************************************************************************/ 
    function loadTemplate($inFileLocation,$inHash,$inFormat){ 
         /* 
        ģ���ļ�Ӧ�������������������ӣ�
            Dear ~!UserName~, 
            Your address is ~!UserAddress~ 
        */ 
         //--ָ��ģ���һЩ����
        $templateDelim =  "~"; 
        $templateNameStart =  "!"; 
         //--�����ⲿ�ִ� 
        $templateLineOut =  ""; 
         //--��ģ���ļ�
        if($templateFile = fopen($inFileLocation, "r")){ 
             //--ѭ�������ļ���һ��һ�еķ���
            while(!feof($templateFile)){ 
                 
				$templateLine = fgets($templateFile,1000); 
                 //--�ֿ��ļ���ÿһ�У���������������У����ҹ淶�����
                $templateLineArray = explode($templateDelim,$templateLine); 
                
                for( $i=0; $i<count($templateLineArray);$i++){ 
                     //--��0��λ�ÿ�ʼѰ�� $templateNameStart 
                    if(strcspn($templateLineArray[$i],$templateNameStart)==0){ 
                         //--�� $templateNameStart ֮��õ��궨�������
                        $hashName = substr($templateLineArray[$i],1); 
                         //--����궨������� 
                        $templateLineArray[$i] = ereg_replace($hashName,(string)$inHash[$hashName],$hashName); 
                    } 
                } 
                 //--����ִ���ȫ�����������뵽�ⲿ������ 
                $templateLineOut .= implode($templateLineArray, "");         
            } 
             //--�ر��ļ�
            fclose($templateFile); 
             //--���̶��ĸ�ʽ�����ʼ�����
            if( strtoupper($inFormat)== "TEXT" ) return($this->setText($templateLineOut)); 
            else if( strtoupper($inFormat)== "HTML" ) return($this->setHTML($templateLineOut)); 
        } 
        return false; 
    } 
/******************************************************************************* 
    ������getRandomBoundary($offset) 
    ����������һ���߽����ֵ
    ������        $offset �� integer ����
    ���أ��ַ���
*******************************************************************************/ 
    function getRandomBoundary($offset = 0){ 
        srand(time()+$offset); 
        return ( "----".(md5(rand()))); 
    } 
/******************************************************************************* 
    ������getContentType($inFileName) 
    ������Ϊ�ļ����෵��һ�� ���ݵ�����
    ������$inFileName ��һ�� string ���ͣ���¼�ļ���(���Ժ�·��) 
    ���أ��ִ�
*******************************************************************************/ 
    function getContentType($inFileName){ 
         //--��ȥ·��
        $inFileName = basename($inFileName); 
         //--����ļ���չ�� 
        if(strrchr($inFileName, ".") == false){ 
            return  "application/octet-stream"; 
        } 
         //--�õ��ļ���չ�������ж��ļ�����
        $extension = strrchr($inFileName, "."); 
        switch($extension){ 
            case  ".gif":    return  "image/gif"; 
            case  ".gz":        return  "application/x-gzip"; 
            case  ".htm":    return  "text/html"; 
            case  ".html":    return  "text/html"; 
            case  ".jpg":    return  "image/jpeg"; 
            case  ".tar":    return  "application/x-tar"; 
            case  ".txt":    return  "text/plain"; 
            case  ".zip":    return  "application/zip"; 
            default:        return  "application/octet-stream"; 
        } 
        return  "application/octet-stream"; 
    } 
/******************************************************************************* 
    ������        formatTextHeader 
    ������    Ϊ�ı�����һ����ʽ������ͷ��Ϣ
    ������        û��
    ���أ�        �ִ�
*******************************************************************************/ 
    function formatTextHeader(){ 
        $outTextHeader =  ""; 
        $outTextHeader .=  "Content-Type: text/plain; charset=us-ascii\n"; 
        $outTextHeader .=  "Content-Transfer-Encoding: 7bit\n\n"; 
        $outTextHeader .= $this->mailText. "\n"; 
        return $outTextHeader; 
    } 
/******************************************************************************* 
    ������        formatHTMLHeader 
    ������    ����һ��HTML��ͷ��Ϣ
    ������        û��
    ���أ�        �ִ�
*******************************************************************************/ 
    function formatHTMLHeader(){ 
        $outHTMLHeader =  ""; 
        $outHTMLHeader .=  "Content-Type: text/html; charset=us-ascii\n"; 
        $outHTMLHeader .=  "Content-Transfer-Encoding: 7bit\n\n"; 
        $outHTMLHeader .= $this->mailHTML. "\n"; 
        return $outHTMLHeader; 
    } 
/******************************************************************************* 
    ������        formatAttachmentHeader($inFileLocation) 
    ������        ����һ��������ͷ��Ϣ
    ������        $inFileLocation �����Ŀ¼��String�ͱ���
    ���أ�        �ִ�
*******************************************************************************/ 
    function formatAttachmentHeader($inFileLocation){ 
        $outAttachmentHeader =  ""; 
         //--ͨ���ļ��е���չ���õ� content-type 
        $contentType = $this->getContentType($inFileLocation); 
         //--�����TEXT�����ͣ���ô���ñ�׼��7bit����
        if(ereg( "text",$contentType)){ 
             //--��ʽ����Ϣͷ
            $outAttachmentHeader .=  "Content-Type: ".$contentType. ";\n"; 
            $outAttachmentHeader .=  ' name="'.basename($inFileLocation). '"'. "\n"; 
            $outAttachmentHeader .=  "Content-Transfer-Encoding: 7bit\n"; 
            $outAttachmentHeader .=  "Content-Disposition: attachment;\n";     //--other: inline 
            $outAttachmentHeader .=  ' filename="'.basename($inFileLocation). '"'. "\n\n"; 
            $textFile = fopen($inFileLocation, "r"); 
             //--һ��һ�еؼ���ļ�
            while(!feof($textFile)){ 
                $outAttachmentHeader .= fgets($textFile,1000); 
            } 
             //--�ر��ļ�
            fclose($textFile); 
            $outAttachmentHeader .=  "\n"; 
        } 
         //--��TEXT������ 64-bit ����
        else{ 
             //--��ʽͷ��Ϣ 
            $outAttachmentHeader .=  "Content-Type: ".$contentType. ";\n"; 
            $outAttachmentHeader .=  ' name="'.basename($inFileLocation). '"'. "\n"; 
            $outAttachmentHeader .=  "Content-Transfer-Encoding: base64\n"; 
            $outAttachmentHeader .=  "Content-Disposition: attachment;\n";     //--other: inline 
            $outAttachmentHeader .=  ' filename="'.basename($inFileLocation). '"'. "\n\n"; 
             //--���� uuencode ���� 
            exec( "uuencode -m $inFileLocation nothing_out",$returnArray); 
             //--����ÿһ�еķ���ֵ
            for ($i = 1; $i<(count($returnArray)); $i++){  
                $outAttachmentHeader .= $returnArray[$i]. "\n"; 
            } 
        }     
        return $outAttachmentHeader; 
    } 
/******************************************************************************* 
    ������        send() 
    ������    �����ʼ�
    ������        û��
    ���أ�        ���ͳɹ�������
*******************************************************************************/ 
    function send(){ 
         //--���ʼ�ͷ��Ϊ��
        $mailHeader =  ""; 
         //--���볭�͵�ַ
        if($this->mailCC !=  "") $mailHeader .=  "CC: ".$this->mailCC. "\n"; 
         //--���밵�͵�ַ
        if($this->mailBCC !=  "") $mailHeader .=  "BCC: ".$this->mailBCC. "\n"; 
         //--���뷢���˵�ַ
        if($this->mailFrom !=  "") $mailHeader .=  "FROM: ".$this->mailFrom. "\n"; 

         
         //--TEXT�ı�
        if($this->mailText !=  "" && $this->mailHTML ==  "" && $this->mailAttachments ==  ""){ 
            return mail($this->mailTo,$this->mailSubject,$this->mailText,$mailHeader); 
        }         
         //--HTML �� TEXT 
        else if($this->mailText !=  "" && $this->mailHTML !=  "" && $this->mailAttachments ==  ""){ 
             //--�õ�һ������߽�
            $bodyBoundary = $this->getRandomBoundary(); 
             //--��ʽ��ͷ��Ϣ 
            $textHeader = $this->formatTextHeader(); 
            $htmlHeader = $this->formatHTMLHeader(); 
             //--���� MIME �汾
            $mailHeader .=  "MIME-Version: 1.0\n"; 
             
			$mailHeader .=  "Content-Type: multipart/alternative;\n"; 
            $mailHeader .=  ' boundary="'.$bodyBoundary. '"'; 
            $mailHeader .=  "\n\n\n"; 
             //--��������ͱ߽�
            $mailHeader .=  "--".$bodyBoundary. "\n"; 
            $mailHeader .= $textHeader; 
            $mailHeader .=  "--".$bodyBoundary. "\n"; 
             //--����HTML�ͽ����߽�
            $mailHeader .= $htmlHeader; 
            $mailHeader .=  "\n--".$bodyBoundary. "--"; 
             //--������Ϣ 
            return mail($this->mailTo,$this->mailSubject, "",$mailHeader); 
        } 
         //--HTML �� TEXT �� ����
        else if($this->mailText !=  "" && $this->mailHTML !=  "" && $this->mailAttachments !=  ""){ 
             
             $attachmentBoundary = $this->getRandomBoundary(); 
             //--Ϊ���еĲ��ֺͱ߽�������Ϣͷ
            $mailHeader .=  "Content-Type: multipart/mixed;\n"; 
            $mailHeader .=  ' boundary="'.$attachmentBoundary. '"'. "\n\n"; 
            $mailHeader .=  "This is a multi-part message in MIME format.\n"; 
            $mailHeader .=  "--".$attachmentBoundary. "\n"; 
             
             //--TEXT �� HTML-- 
             $bodyBoundary = $this->getRandomBoundary(1); 
             //--��ʽ��ͷ��Ϣ
            $textHeader = $this->formatTextHeader(); 
            $htmlHeader = $this->formatHTMLHeader(); 
             //--���� MIME �汾
            $mailHeader .=  "MIME-Version: 1.0\n"; 
             //--Ϊ���еĲ��ֺͱ߽�������Ϣͷ
            $mailHeader .=  "Content-Type: multipart/alternative;\n"; 
            $mailHeader .=  ' boundary="'.$bodyBoundary. '"'; 
            $mailHeader .=  "\n\n\n"; 
             //--��������ͱ߽�
            $mailHeader .=  "--".$bodyBoundary. "\n"; 
            $mailHeader .= $textHeader; 
            $mailHeader .=  "--".$bodyBoundary. "\n"; 
             //--���� html �� ��β�߽�
            $mailHeader .= $htmlHeader; 
            $mailHeader .=  "\n--".$bodyBoundary. "--"; 
                          
             //--�õ������ļ�������
            $attachmentArray = explode( ",",$this->mailAttachments); 
             //--������һ������
            for($i=0;$i<count($attachmentArray);$i++){ 
                 //--�����ָ���־ 
                $mailHeader .=  "\n--".$attachmentBoundary. "\n"; 
                 //--�õ�������Ϣ
                $mailHeader .= $this->formatAttachmentHeader($attachmentArray[$i]); 
            } 
            $mailHeader .=  "--".$attachmentBoundary. "--"; 
            return mail($this->mailTo,$this->mailSubject, "",$mailHeader); 
        } 
        return false; 
    } 
} 
?> 