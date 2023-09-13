class File {
    private $filename;
    private $dir = 'uploads/';

    public function __construct() {
        $action = isset($_POST['action']) ? $_POST['action'] : false;
        $this->filename = isset($_POST['filename']) ? $_POST['filename'] : false;
        if ((!$action) || (!$this->filename)) return;
        switch ($action) {
            case 'save' :
                $this->save(); break;
            case 'load' :
                $this->load(); break;
            case 'delete' :
                $this->delete(); break;
            default :
                return;
                break;
        }
    }
    private function save() {
        $content = isset($_POST['content']) ? $_POST['content'] : '';
        file_put_contents($this->dir.$this->filename, urldecode($content));
    }
    private function load() {
        $content = @file_get_contents($this->dir.$this->filename);
        echo $content;
    }
    private function delete() {
        unlink($this->dir.$this->filename);
    }
}
$file = new File();