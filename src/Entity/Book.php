<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BookRepository")
 * @ORM\Table(name="books")
 * @Vich\Uploadable
 */
class Book
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $imageName;

    /**
     * @var File
     *
     * @Vich\UploadableField(mapping="post_image", fileNameProperty="imageName", size="imageSize")
     * @Assert\File(maxSize="2M", mimeTypesMessage = "Please upload a valid image")
     */
    private $imageFile;

    /**
     * @ORM\ManyToOne(targetEntity="Author", inversedBy="books")
     * @ORM\JoinColumn(name="author", referencedColumnName="id")
     * @Assert\NotBlank()
     */
    private $author;

    /**
     * @ORM\ManyToOne(targetEntity="Genre", inversedBy="books")
     * @ORM\JoinColumn(name="genre", referencedColumnName="id")
     * @Assert\NotBlank()
     */
    private $genre;

    /**
     * @ORM\ManyToOne(targetEntity="Language", inversedBy="book")
     * @ORM\JoinColumn(name="language", referencedColumnName="id")
     * @Assert\NotBlank()
     */
    private $language;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank()
     */
    private $publicationDate;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $ISBNNumber;

    /**
     * Get id
     *
     * @return int
     */
    public function getId(): ? int
    {
        return $this->id;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle(): ? string
    {
        return $this->title;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Book
     */
    public function setTitle($title): ? Book
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get image name
     *
     * @return string
     */
    public function getImageName(): string
    {
        return $this->imageName;
    }

    /**
     * Set image name
     *
     * @param string $imageName
     * @return Book
     */
    public function setImageName(string $imageName): ? Book
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * Get file
     *
     * @return File
     */
    public function getImageFile(): File
    {
        return $this->imageFile;
    }

    /**
     * Set file
     *
     * @param File $imageFile
     * @return Book
     */
    public function setImageFile(File $imageFile): ? Book
    {
        $this->imageFile = $imageFile;

        return $this;
    }

    /**
     * Get author
     *
     * @return Author
     */
    public function getAuthor(): ? Author
    {
        return $this->author;
    }

    /**
     * Set author
     *
     * @param Author $author
     * @return Book
     */
    public function setAuthor($author): ? Book
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get genre
     *
     * @return Genre
     */
    public function getGenre(): ? Genre
    {
        return $this->genre;
    }

    /**
     * Set genre
     *
     * @param Genre $genre
     * @return Book
     */
    public function setGenre($genre): ? Book
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get language
     *
     * @return Language
     */
    public function getLanguage(): ? Language
    {
        return $this->language;
    }

    /**
     * Set language
     *
     * @param Language $language
     * @return Book
     */
    public function setLanguage($language): ? Book
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get publication date
     *
     * @return \DateTime
     */
    public function getPublicationDate(): ? \DateTime
    {
        return $this->publicationDate;
    }

    /**
     * Set publication date
     *
     * @param \DateTime $publicationDate
     * @return Book
     */
    public function setPublicationDate($publicationDate): ? Book
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }

    /**
     * Get ISBN number
     *
     * @return string
     */
    public function getISBNNumber()
    {
        return $this->ISBNNumber;
    }

    /**
     * Set ISBN number
     *
     * @param string $ISBNNumber
     * @return Book
     */
    public function setISBNNumber($ISBNNumber): ? Book
    {
        $this->ISBNNumber = $ISBNNumber;

        return $this;
    }
}