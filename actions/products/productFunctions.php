<?php
include dirname(__FILE__, 3) . '/validations/validateRequired.php';
include dirname(__FILE__, 3) . '/helpers/uploadImage.php';
$configPath =  dirname(__FILE__, 3) . '/config/config.php';
if (file_exists($configPath)) {
    include_once $configPath;
} else {
    die("Configuration file not found.");
}
$path = dirname(__FILE__, 3) . '/database/products.json';
$arrayProducts = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    store($_POST);
}
?>
<?php
function index() {}

function create() {}

function store(array $requsts)
{
    validateRequired($requsts);
    $imageName = uploadImage($_FILES['image']);
    if ($imageName) {
        $requsts['image'] = $imageName;
    }

    global $path;
    global $arrayProducts;

    $directory = dirname($path);

    if (!is_dir($directory)) {
        mkdir($directory, 0777, true);
    }

    if (file_exists($path)) {
        $data = file_get_contents($path);
        $arrayProducts = json_decode($data, true) ?? [];
    }
    // Füge alten Produkten, die keine ID haben, IDs hinzu.
    foreach ($arrayProducts as $index => &$product) {

        if (!isset($product['id'])) {
            $product['id'] = $index + 1;
        }
    }
    unset($product);
    // Neue ID generieren
    $newId = count($arrayProducts) + 1;

    // ID zu neuem Produkt hinzufügen
    $requsts['id'] = $newId;

    $arrayProducts[] = $requsts;
    $dataJson = json_encode($arrayProducts, JSON_PRETTY_PRINT);
    file_put_contents($path, $dataJson);
    header("Location: " . BASE_URL . "views/products/product.php");
    exit;
}

function show() {}

function edit() {}

function update() {}

function destroy() {}
