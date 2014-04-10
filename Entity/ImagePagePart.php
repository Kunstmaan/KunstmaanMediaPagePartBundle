<?php

namespace Kunstmaan\MediaPagePartBundle\Entity;
use Kunstmaan\PagePartBundle\Entity\AbstractPagePart;

use Doctrine\ORM\Mapping as ORM;
use Kunstmaan\MediaPagePartBundle\Form\ImagePagePartAdminType;
use Kunstmaan\MediaBundle\Entity\Media;

/**
 * ImagePagePart
 *
 * @ORM\Entity
 * @ORM\Table(name="kuma_image_page_parts")
 */
class ImagePagePart extends AbstractPagePart
{

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $link;

    /**
     * @ORM\Column(type="boolean", nullable=true, name="open_in_new_window")
     */
    protected $openInNewWindow;

    /**
     * @ORM\Column(type="string", nullable=true, name="alt_text")
     */
    protected $altText;

    /**
     * @ORM\ManyToOne(targetEntity="Kunstmaan\MediaBundle\Entity\Media")
     * @ORM\JoinColumn(name="media_id", referencedColumnName="id")
     */
    protected $media;

    /**
     * @ORM\Column(type="string", nullable=true, name="align")
     */
    protected $align;

    /**
     * @ORM\Column(type="integer", nullable=true, name="width")
     */
    protected $width;

    /**
     * @ORM\Column(type="integer", nullable=true, name="height")
     */
    protected $height;
    /**
     * Get opennewwindow
     *
     * @return bool
     */
    public function getOpenInNewWindow()
    {
        return $this->openInNewWindow;
    }

    /**
     * Set openwinnewwindow
     *
     * @param bool $openInNewWindow
     *
     * @return ImagePagePart
     */
    public function setOpenInNewWindow($openInNewWindow)
    {
        $this->openInNewWindow = $openInNewWindow;

        return $this;
    }

    /**
     * Set link
     *
     * @param string $link
     *
     * @return ImagePagePart
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set alt text
     *
     * @param string $altText
     *
     * @return ImagePagePart
     */
    public function setAltText($altText)
    {
        $this->altText = $altText;

        return $this;
    }

    /**
     * Get media
     *
     * @return Media
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Set media
     *
     * @param Media $media
     *
     * @return ImagePagePart
     */
    public function setMedia($media)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get alt text
     *
     * @return string
     */
    public function getAltText()
    {
        return $this->altText;
    }

    /**
     * Gets the value of align.
     *
     * @return string
     */
    public function getAlign()
    {
        return $this->align;
    }

    /**
     * Sets the value of align.
     *
     * @param string $align the align
     *
     * @return self
     */
    public function setAlign($align)
    {
        $this->align = $align;

        return $this;
    }

    /**
     * Gets the value of width.
     *
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Sets the value of width.
     *
     * @param int $width the width
     *
     * @return self
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Gets the value of height.
     *
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Sets the value of height.
     *
     * @param int $height the height
     *
     * @return self
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        if ($this->getMedia()) {
            return $this->getMedia()->getUrl();
        }

        return "";
    }

    /**
     * @return string
     */
    public function getDefaultView()
    {
        return "KunstmaanMediaPagePartBundle:ImagePagePart:view.html.twig";
    }

    /**
     * @return ImagePagePartAdminType
     */
    public function getDefaultAdminType()
    {
        return new ImagePagePartAdminType();
    }
}
