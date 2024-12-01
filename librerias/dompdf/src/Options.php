<?php
namespace Dompdf;

class Options
{
    /** @var string */
    private $rootDir;

    /** @var string */
    private $tempDir;

    /** @var string */
    private $fontDir;

    /** @var string */
    private $fontCache;

    /** @var array */
    private $chroot;

    /** @var string */
    private $logOutputFile;

    /** @var string */
    private $defaultMediaType = "screen";

    /**
     * @see \Dompdf\Adapter\CPDF::PAPER_SIZES for valid sizes
     * @var string
     */
    private $defaultPaperSize = "letter";

    /** @var string */
    private $defaultPaperOrientation = "portrait";

    /** @var string */
    private $defaultFont = "serif";

    /** @var int */
    private $dpi = 96;

    /** @var float */
    private $fontHeightRatio = 1.1;

    /** @var bool */
    private $isPhpEnabled = false;

    /** @var bool */
    private $isRemoteEnabled = false;

    /** @var bool */
    private $isJavascriptEnabled = true;

    /** @var bool */
    private $isHtml5ParserEnabled = false;

    /** @var bool */
    private $isFontSubsettingEnabled = true;

    /** @var bool */
    private $debugPng = false;

    /** @var bool */
    private $debugKeepTemp = false;

    /** @var bool */
    private $debugCss = false;

    /** @var bool */
    private $debugLayout = false;

    /** @var bool */
    private $debugLayoutLines = true;

    /** @var bool */
    private $debugLayoutBlocks = true;

    /** @var bool */
    private $debugLayoutInline = true;

    /** @var bool */
    private $debugLayoutPaddingBox = true;

    /** @var string */
    private $pdfBackend = "CPDF";

    /** @var string */
    private $pdflibLicense = "";

    /**
     * Constructor
     * @param array|null $attributes
     */
    public function __construct(array $attributes = null)
    {
        $rootDir = realpath(__DIR__ . "/../");
        $this->setChroot([$rootDir]);
        $this->setRootDir($rootDir);
        $this->setTempDir(sys_get_temp_dir());
        $this->setFontDir($rootDir . "/lib/fonts");
        $this->setFontCache($this->getFontDir());
        $this->setLogOutputFile($this->getTempDir() . "/log.htm");

        if ($attributes !== null) {
            $this->set($attributes);
        }
    }

    /**
     * Set attributes
     * @param array|string $attributes
     * @param mixed|null $value
     * @return $this
     */
    public function set($attributes, $value = null)
    {
        if (!is_array($attributes)) {
            $attributes = [$attributes => $value];
        }
        foreach ($attributes as $key => $value) {
            $method = 'set' . str_replace('_', '', ucwords($key, '_'));
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
        return $this;
    }

    /**
     * Get attribute
     * @param string $key
     * @return mixed|null
     */
    public function get($key)
    {
        $method = 'get' . str_replace('_', '', ucwords($key, '_'));
        if (method_exists($this, $method)) {
            return $this->$method();
        }
        return null;
    }

    /** Métodos set y get... */
    
    // Coloca aquí los métodos restantes, todos corregidos.
}
