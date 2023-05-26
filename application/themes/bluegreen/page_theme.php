<?php defined('C5_EXECUTE') or die('Access Denied.');
namespace Concrete\Application\Themes\Bluegreen;

use Concrete\Core\Area\Layout\Preset\Provider\ThemeProviderInterface;
use Concrete\Core\Page\Theme\Theme;

class PageTheme extends Theme implements ThemeProviderInterface {
    protected $pThemeGridFrameworkHandle = false;

    public function getThemeName() {
        return t('Bluegreen');
    }

    public function getThemeDescription() {
        return t('Custom Concrete CMS theme created by Bluegreen Design Consultants');
    }

    public function registerAssets() {  
        //$this->requireAsset('css', 'font-awesome');
        $this->requireAsset("javascript", "jquery");
        $this->requireAsset("javascript", "picturefill");
        //$this->requireAsset("core/lightbox");
        //$this->requireAsset('jquery/ui');
        $this->requireAsset("javascript-conditional", "html5-shiv");
        $this->requireAsset("javascript-conditional", "respond");
    }

    public function getThemeBlockClasses()
    {
        return array(
            'content' => array('box','panel','padded','bg-primary','bg-secondary','bg-highlight','bg-tint','bg-magenta','bg-neutral'),
            'core_area_layout' => array('wrapper-full','wrapper','padded','bg-primary','bg-secondary','bg-highlight','bg-tint','bg-magenta','bg-neutral')
        );
    }

    public function getThemeAreaClasses()
    {
        return array(
            'Page Header' => array('padded','bg-primary','bg-secondary','bg-highlight','bg-tint','bg-magenta','bg-neutral'),
            'Main' => array('padded','bg-primary','bg-secondary','bg-highlight','bg-tint','bg-magenta','bg-neutral'),
            'Sidebar' => array('padded','bg-primary','bg-secondary','bg-highlight','bg-tint','bg-magenta','bg-neutral'),
            'Page Footer' => array('padded','bg-primary','bg-secondary','bg-highlight','bg-tint','bg-magenta','bg-neutral'),
            'Full' => array('padded','bg-primary','bg-secondary','bg-highlight','bg-tint','bg-magenta','bg-neutral')
        );
    }

    public function getThemeDefaultBlockTemplates()
    {
        return array(
            //'image' => 'some_special_image_template'
        );
    }

    public function getThemeResponsiveImageMap() {
        return [
            'lg' => '1000px',
            'md' => '600px',
            'sm' => '0'
        ];
    }

    public function getThemeEditorClasses() {
        return array(
                array(
                        'title' => t('CLEAR STYLES'),
                        'element' => array('h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p'),
                        'attributes' => array('class' => '')
                ),
                array(
                        'title' => t('Lead Text'),
                        'element' => array('h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p'),
                        'attributes' => array('class' => 'text-lead')
                ),
                array(
                        'title' => t('Highlight Text'),
                        'element' => array('h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p'),
                        'attributes' => array('class' => 'text-highlight')
                ),
                array(
                        'title' => t('Muted Text'),
                        'element' => array('h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p'),
                        'attributes' => array('class' => 'text-muted')
                ),
                array(
                        'title' => t('Small Text'),
                        'element' => array('h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p'),
                        'attributes' => array('class' => 'text-small'),
                ),
                array(
                        'title' => t('Small Muted Text'),
                        'element' => array('h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p'),
                        'attributes' => array('class' => 'text-small text-muted')
                ),
                array(
                        'title' => t('Button'),
                        'element' => array('a', 'span'),
                        'attributes' => array('class' => 'btn btn-slide'),
                ),
                array(
                    'title' => t('Green Button'),
                    'element' => array('a', 'span'),
                    'attributes' => array('class' => 'btn btn-primary btn-slide'),
            ),
            array(
                'title' => t('Purple Button'),
                'element' => array('a', 'span'),
                'attributes' => array('class' => 'btn btn-secondary btn-slide'),
        ),
            array(
                        'title' => t('Outline Button'),
                        'element' => array('a', 'span'),
                        'attributes' => array('class' => 'btn btn-outline')
                ),
        );
    }

    public function getThemeAreaLayoutPresets()
    {
        $presets = array(
            array(
                'handle' => 'default',
                'name' => 'Default 2 Column',
                'container' => '<div class="layout-flex"></div>',
                'columns' => array(
                    '<div class="content stack"></div>',
                    '<div class="stack"></div>'
                ),
            ),
            array(
                'handle' => '2col',
                'name' => '2 Column',
                'container' => '<div class="layout-flex"></div>',
                'columns' => array(
                    '<div class="stack"></div>',
                    '<div class="stack"></div>'
                ),
            ),
            array(
                'handle' => '3col',
                'name' => '3 Column',
                'container' => '<div class="layout-flex"></div>',
                'columns' => array(
                    '<div class="stack"></div>',
                    '<div class="stack"></div>',
                    '<div class="stack"></div>'
                ),
            ),
            array(
                'handle' => '4col',
                'name' => '4 Column',
                'container' => '<div class="layout-flex"></div>',
                'columns' => array(
                    '<div class="stack"></div>',
                    '<div class="stack"></div>',
                    '<div class="stack"></div>',
                    '<div class="stack"></div>'
                ),
            ),
            array(
                'handle' => '1col',
                'name' => 'Single Column',
                'container' => '<div class="wrapper"></div>',
                'columns' => array(
                    '<div class="stack"></div>'
                ),
            ),
            array(
                'handle' => '1colFull',
                'name' => 'Single Column (Full Width)',
                'container' => '<div class="wrapper-full"></div>',
                'columns' => array(
                    '<div class="stack"></div>'
                ),
            ),
        );
        return $presets;
    }
}