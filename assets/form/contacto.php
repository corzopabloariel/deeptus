<?php
try {
    $elements = ["Nombre" => $_REQUEST["name"], "Email" => $_REQUEST["email"], "Consulta" => $_REQUEST["text"]];
    if (empty($_REQUEST["name"]) || empty($_REQUEST["email"]) || empty($_REQUEST["text"])) {
        $aux = "";
        foreach($elements AS $k => $v) {
            if (!empty($aux))
                $aux .= ", ";
            $aux .= $k;
        }
        echo json_encode(["error" => 1, "msg" => "Faltan: {$aux}"]);
        die();
    }
    $to = "corzo.pabloariel@gmail.com";//'hola@pablocorzo.dev';
    $subject = "Consulta DEEPTUS";
    $message = $elements["Consulta"];
    $headers = "From: {$elements["Email"]}\r\n" .
        "Reply-To: {$elements["Email"]}\r\n" .
        "X-Mailer: PHP/" . phpversion();
    mail($to, $subject, $message, $headers);
} catch (\Throwable $th) {
    echo json_encode(["error" => 1, "msg" => "Ocurrió un error"]);
}
echo json_encode(["error" => 0, "msg" => "Formulario enviado"]);