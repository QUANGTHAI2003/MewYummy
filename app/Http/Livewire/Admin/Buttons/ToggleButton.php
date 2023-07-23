<?php

namespace App\Http\Livewire\Admin\Buttons;

use Exception;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Database\Eloquent\Model;

class ToggleButton extends Component
{

    use Actions;

    public Model $model;
    public string $field;
    public bool $isActive;

    public function mount()
    {
        $this->isActive = (bool)$this->model->getAttribute($this->field);
    }

    public function updating($field, $value)
    {
        try {
            $this->model->setAttribute($this->field, $value)->save();
            if ($value) {
                $this->notification()->success(
                    $title = 'Đã lưu !!!',
                    $description = 'Đã cập nhật trạng thái sang <strong>Hiển thị</strong>'
                );
            } else {
                $this->notification()->success(
                    $title = 'Đã lưu !!!',
                    $description = 'Đã cập nhật trạng thái sang <strong>Ẩn</strong>'
                );
            }
        } catch (Exception $e) {
            $this->notification()->error(
                $title = 'Đã xảy ra lỗi !!!',
                $description = 'Cập nhật trạng thái thất bại'
            );
        }
    }

    public function render()
    {
        return view('livewire.admin.buttons.toggle-button');
    }
}
