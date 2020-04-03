<?php
/**
 * Main.php
 *
 * Created in 2020/4/3 4:00 下午
 * Created by johnwu
 */

class Main extends \Handler
{
    public function index()
    {
        $this->show('header.html');
        $data = $this->DB->Select("students")->Fetch();
        $this->show('index.php', array('data' => $data));
        $this->show('footer.html');
    }

    public function add()
    {
        $this->show('header.html');
        $this->show('add.php');
        $this->show('footer.html');
    }

    public function addAction()
    {
        $data = array(
            'no' => $this->POST('no'),
            'name' => $this->POST('name'),
            'gender' => (int)$this->POST('gender'),
            'phone' => $this->POST('phone')
        );

        // checker
        $is_validate = $this->check->validate(
            array(
                'no' => ['学号', ['string', 'length: 8'], true],
                'name' => ['姓名', ['string', 'minlength: 1'], true],
                'gender' => ['性别', ['int', 'length: 1', 'min: 0', 'max: 1'], true],
                'phone' => ['手机号', ['string', 'length: 11'], true],
            ),
            $data
        );
        if (!$is_validate) {
            $this->show('header.html');
            $this->show('add.php', array_merge(array('error' => $this->check->get_error_message()), $data));
            $this->show('footer.html');
            return;
        }

        $this->DB->Insert('students', $data);
        $this->redirect('/');
    }
}