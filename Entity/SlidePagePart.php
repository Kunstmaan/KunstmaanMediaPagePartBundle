<?php

namespace Kunstmaan\MediaPagePartBundle\Entity;
use Kunstmaan\PagePartBundle\Entity\AbstractPagePart;

use Doctrine\ORM\Mapping as ORM;
use Kunstmaan\MediaPagePartBundle\Form\SlidePagePartAdminType;
use Kunstmaan\MediaBundle\Entity\Media;

/**
 * SlidePagePart
 *
 * @ORM\Entity
 * @ORM\Table(name="kuma_slide_page_parts")
 */
class SlidePagePart extends AbstractPagePart
{

    /**
     * @ORM\ManyToOne(targetEntity="Kunstmaan\MediaBundle\Entity\Media")
     * @ORM\JoinColumn(name="media_id", referencedColumnName="id")
     */
    public $media;

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
     */
    public function setMedia($media)
    {
        $this->media = $media;
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
        return "KunstmaanMediaPagePartBundle:SlidePagePart:view.html.twig";
    }

    /**
     * @return string
     */
    public function getElasticaView()
    {
        return $this->getDefaultView();
    }

    /**
     * @return SlidePagePartAdminType
     */
    public function getDefaultAdminType()
    {
        return new SlidePagePartAdminType();
    }
}
