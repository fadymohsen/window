<?php
require "/home/u165969086/domains/windowadv.com/public_html/vendor/autoload.php";
$app = require "/home/u165969086/domains/windowadv.com/public_html/bootstrap/app.php";
$app->make("Illuminate\Contracts\Console\Kernel")->bootstrap();

$src = new PDO("mysql:host=localhost;dbname=u165969086_jMeIT","u165969086_0DdEQ","@Window2026");
$src->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$rows = $src->query("SELECT locale, content, meta_title, meta_description, meta_keywords FROM service_translations WHERE service_id = (SELECT id FROM services WHERE slug = 'event-management')")->fetchAll(PDO::FETCH_ASSOC);

$sid = Illuminate\Support\Facades\DB::table("services")->where("slug", "event-management")->value("id");

foreach ($rows as $r) {
    Illuminate\Support\Facades\DB::table("service_translations")
        ->where("service_id", $sid)
        ->where("locale", $r["locale"])
        ->update([
            "content" => $r["content"],
            "meta_title" => $r["meta_title"],
            "meta_description" => $r["meta_description"],
            "meta_keywords" => $r["meta_keywords"],
        ]);
}

echo "Synced " . count($rows) . " rows\n";
