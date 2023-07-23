<?php

namespace App\Http\Livewire\Admin\Buttons;

use Exception;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ToggleButton extends Component {

    use Actions;
    use AuthorizesRequests;

    public Model $model;
    public string $field;
    public bool $isActive;

    public function mount() {
        $this->isActive = (bool) $this->model->getAttribute($this->field);
    }

    public function updating($field, $value) {
        try {
            try {
                $this->authorize('Update category');
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
                    $description = 'Bạn không có quyền cập nhật trạng thái'
                );
            }
        } catch (Exception $e) {
            $this->notification()->error(
                $title = 'Đã xảy ra lỗi !!!',
                $description = 'Cập nhật trạng thái thất bại'
            );
        }
    }

    public function render() {
        return view('livewire.admin.buttons.toggle-button');
    }
}
