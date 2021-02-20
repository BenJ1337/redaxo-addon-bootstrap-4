<h1>Custom Modul</h1>

<?php
function countUsagesOfModules()
{
    $sql = rex_sql::factory();
    $sql->setQuery("SELECT module_id FROM rex_article_slice");
    $module_ids_results = $sql->getDBArray();
    $module_ids = array();
    foreach ($module_ids_results as $module_ids_result) {
        $val = 1;
        if (isset($module_ids[$module_ids_result['module_id']])) {
            $val = $module_ids[$module_ids_result['module_id']] + 1;
        }
        $module_ids[$module_ids_result['module_id']] = $val;
    }
    return $module_ids;
}

function getModulesFromDB($user)
{
    $sql = rex_sql::factory();
    $sql->setQuery("SELECT * FROM rex_module " . ($user != null ? "WHERE createuser = '" . $user . "'" : ""));
    return $sql->getDBArray();
}

if (isset($_POST["copy_modules_from_database"]) || isset($_POST["archive_modules_from_database"])) {
    $modules = getModulesFromDB(null);

    $rexModulesPath = 'rex_modules';
    $subPath = 'work';
    if (isset($_POST["archive_modules_from_database"])) {
        $subPath = 'archive/' . date("Y_m_s - H_i_s", time());
    }
    if (!isset($_POST["archive_modules_from_database"])) {
        rex_dir::deleteFiles(
            rex_path::addon('custommodules', '/' . $rexModulesPath . '/' . $subPath)
        );
    }

    foreach ($modules as $module) {
        $filename = $module['id'] . '-' . $module['name'] . '.json';
        rex_dir::create(
            rex_path::addon('custommodules', $rexModulesPath . '/' . $subPath)
        );
        rex_file::put(
            rex_path::addon('custommodules', '/' . $rexModulesPath . '/' . $subPath . '/' . $filename),
            json_encode($module)
        );
    }
    $html = '<div class="alert alert-success">'
        . '<p>'
        . (isset($_POST["archive_modules_from_database"]) ? 'Archivierung erfolgreich' : 'Kopieren erfolgreich')
        . '</p> '
        . '</div>';
    echo $html;
}

function isModuleAlreadyInDB($modulesFromDB, $curModule)
{
    foreach ($modulesFromDB as $module) {
        if (
            $module['name'] === $curModule['name']
        ) {
            if (sizeof(array_diff($module, $curModule)) < 3) {
                return true;
            }
        }
    }
    return false;
}

if (isset($_POST["copy_modules_to_database"])) {
    $error = false;

    $sql = rex_sql::factory();
    $rexModulesPath = 'rex_modules';
    $subPath = 'work';
    $directory = rex_path::addon('custommodules', '/' . $rexModulesPath . '/' . $subPath . '/');
    $module_paths = glob($directory . "*.json");
    $modulesFromDB = getModulesFromDB('custommodulese');
    $index = 0;
    $messagesInfo = array();
    $messagesWarning = array();
    $messagesError = array();
    foreach ($module_paths as $module_path) {
        $file = rex_file::get($module_path);
        if ($file == null) {
            array_push($messagesError, 'Datei nicht gefunden: "' . $module_path . '"');
        }
        $module = json_decode($file, true);
        if (
            isModuleAlreadyInDB($modulesFromDB, $module)
        ) {
            array_push($messagesWarning, 'Modul "' . $module['name'] . '" bereits in Datenbank');
        } else {
            $module['createuser'] = 'custommodulese';
            array_push($messagesInfo, 'Modul "' . $module['name'] . '" der Datenbank erfolgreich hinzugefügt');
            unset($module['id']);
            $sql->setTable("rex_module");
            $sql->setValues($module);
            $index += $sql->insert()->getRows();
        }
    }
    $html = '';
    if (sizeof($messagesInfo) > 0) {
        $html .= '<div class="alert alert-success' . '">';
        foreach ($messagesInfo as $m) {
            $html .= '<p>' . $m . '</p>';
        }
        $html .= '</div>';
    }
    if (sizeof($messagesWarning) > 0) {
        $html .= '<div class="alert alert-warning' . '">';
        foreach ($messagesWarning as $m) {
            $html .= '<p>' . $m . '</p>';
        }
        $html .= '</div>';
    }
    if (sizeof($messagesError) > 0) {
        $html .= '<div class="alert alert-danger' . '">';
        foreach ($messagesError as $m) {
            $html .= '<p>' . $m . '</p>';
        }
        $html .= '</div>';
    }
    echo $html;
}
if (isset($_POST["delete_modules_from_database"])) {
    $modules = getModulesFromDB('custommodulese');
    $moduleUsages = countUsagesOfModules();
    $messages = array();
    $result = 0;
    foreach ($modules as $module) {
        if (isset($moduleUsages[$module['id']])) {
            array_push($messages, 'Modul "' . $module['name'] . '" (' . $module['id'] . ') nicht gelöscht, da ' . $moduleUsages[$module['id']] . ' Mal in Benutzung.');
        } else {
            $sql = rex_sql::factory();
            $sql->setTable("rex_module");
            $sql->setWhere("createuser =:user AND id =:mid", ["user" => "custommodulese", "mid" => $module['id']]);
            $result += $sql->delete()->getRows();
        }
    }
    $html = '<div class="alert alert-' . ($result > 0 ? 'success' : 'warning') . '">'
        . '<p>'
        . ($result > 0 ? $result . ' Module erfolgreich aus Datenbank gelöscht.' . $result : 'Es wurden keine Module aus der Datenbank entfernt.')
        . '</p> '
        . '</div>';
    if (sizeof($messages) > 0) {
        $html .= '<div class="alert alert-warning' . '">';
        foreach ($messages as $m) {
            $html .= '<p>' . $m . '</p>';
        }
        $html .= '</div>';
    }
    echo $html;
}
?>

<form action="<?php echo $_SERVER["REQUEST_URI"] ?>" method="post">
    <button name="copy_modules_from_database" type="submit" class="btn btn-success">
        Module aus Datenbank kopieren
    </button>
    <button name="archive_modules_from_database" type="submit" class="btn btn-success">
        Module aus Datenbank archivieren
    </button>
    <button name="copy_modules_to_database" type="submit" class="btn btn-success">
        Module in Datenbank kopieren
    </button>
    <button name="delete_modules_from_database" type="submit" class="btn btn-danger">
        Module aus Datenbank löschen
    </button>
</form>