<?php

namespace App\Services;

class OperationsService
{
    private static OperationsService $instance;

    public Project\ProjectService $Project;
    public Service\ServiceService $Service;
    public Service\ContactService $Contact;

    public Partner\PartnerService $Partner;
    public Setting\SettingService $Setting;
    public Feedback\FeedbackService $Feedback;
    public CoverImage\CoverImageService $CoverImage;

    private function __construct()
    {
        $this->Project = new Project\ProjectService();
        $this->Service = new Service\ServiceService();
        $this->Partner = new Partner\PartnerService();
        $this->Setting = new Setting\SettingService();
        $this->Feedback = new Feedback\FeedbackService();
        $this->CoverImage = new CoverImage\CoverImageService();
        $this->Contact = new Service\ContactService();

    }
    public static function getInstance(): OperationsService
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

}
