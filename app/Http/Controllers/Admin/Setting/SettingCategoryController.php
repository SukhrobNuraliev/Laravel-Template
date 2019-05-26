<?php
/**
 * @author          Archie Disono (webmonsph@gmail.com)
 * @link            https://github.com/disono/Laravel-Template
 * @copyright       Webmons Development Studio. (https://webmons.com), 2016-2019
 * @license         Apache, 2.0 https://github.com/disono/Laravel-Template/blob/master/LICENSE
 */

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\BaseController;
use App\Models\SettingCategory;

class SettingCategoryController extends BaseController
{
    protected $viewType = 'admin';
    protected $dataName = 'setting_category';

    protected $requestValuesSearch = 'name';
    protected $indexEnableSearch = true;

    protected $allowShow = true;
    protected $allowCreate = true;
    protected $allowEdit = true;
    protected $allowDelete = true;

    protected $failedCreation = 'Failed to create new setting categories.';
    protected $failedUpdate = 'Failed to update setting category.';

    protected $afterRedirectUrl = '/admin/setting/categories';

    protected $indexTitle = 'Setting Categories';

    public function __construct()
    {
        parent::__construct();
        $this->theme = 'settings.setting.category';
        $this->modelName = new SettingCategory();
    }
}
