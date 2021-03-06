/**
 * @author              Archie Disono (webmonsph@gmail.com)
 * @link                https://github.com/disono/Laravel-Template
 * @lincense            https://github.com/disono/Laravel-Template/blob/master/LICENSE
 * @copyright           Webmons Development Studio
 */

Vue.use(WBProviderPlugin);
Vue.use(WBToolbarPlugin);

new Vue({
    el: '#WBApp',

    mounted: function () {
        // initialize libraries and non-vue codes (/public/assets/js/vendor/initialize.js)
        WBInitialize();

        // on change category checkbox
        jQ('[name="page_category_id[]"]').on('change', function () {
            let parent_id = jQ(this).val();

            if (jQ(this).is(':checked')) {
                jQ('[data-parent-id="' + parent_id + '"]').prop("checked", true).change();
            } else {
                jQ('[data-parent-id="' + parent_id + '"]').prop("checked", false).change();
            }
        });
    },

    data: {
        frmAdminPage: {
            name: jQ('#name[data-value]').val(),
            slug: jQ('#slug[data-value]').val()
        }
    },

    methods: {
        adminPageOnNameChange() {
            if (this.frmAdminPage.name) {
                this.frmAdminPage.slug = this.frmAdminPage.name.replace(/\s+/g, '-').toLowerCase();
            }
        }
    }
});

