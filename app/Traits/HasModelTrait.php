<?php
namespace App\Traits;
use Carbon\Carbon;
use Auth;

trait HasModelTrait
{
    public function showStatusOf($record)
    {
        switch ($record) {
            case $record->is_active == 1:
                return '<span class="label label-success" aria-hidden="true">Active</span>';
                break;
            case $record->is_active == 0:
                return '<span class="label label-danger" aria-hidden="true">Disabled</span>';
                break;
            default:
                return '<span class="label label-danger" aria-hidden="true">Disabled</span>';
        }
    }

    public function showConfirmedOf($record)
    {
        switch ($record) {
            case $record->confirmed == 1:
                return '<label class="label label-success" aria-hidden="true">Confirmed</label>';
                break;
            case $record->confirmed == 0:
                return '<label class="label label-warning" aria-hidden="true">Pending</label>';
                break;
            default:
                return '<label class="label label-warning" aria-hidden="true">Pending</label>';
        }
    }

    public function seenUnseen($record)
    {
        switch ($record) {
            case $record->seen == 1:
                return '<label class="label label-success" aria-hidden="true">seen</label>';
                break;
            case $record->seen == 0:
                return '<label class="label label-warning" aria-hidden="true">unseen</label>';
                break;
            default:
                return '<label class="label label-warning" aria-hidden="true">pending</label>';
        }
    }

}