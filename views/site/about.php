<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

   
    <p>
        <?= Html::img('@web/images/logo.png', ['alt' => 'Company Logo', 'class' => 'company-logo']) ?> 
         Welcome to [Company Name]! Our company has been at the forefront of [industry] innovation since its inception in [year]. We are committed to providing the best [products/services] to our customers.
    </p>

    <h2>Our Vision and Values</h2>
    <p>
        At [Company Name], we believe in [core values such as integrity, innovation, customer satisfaction, etc.]. Our mission is to [briefly state the mission]. We are dedicated to [describe key commitments or goals].
    </p>

    <h2>Our Team</h2>
    <p>
        We have a dedicated team of professionals who are passionate about [industry]. Meet some of our key team members:
    </p>
    <ul>
        <li><strong>John Doe - CEO:</strong> John has over 20 years of experience in [industry] and has been the driving force behind our success.</li>
        <li><strong>Jane Smith - CTO:</strong> With a background in [relevant field], Jane leads our technology and innovation department.</li>
    </ul>

    <h2>What We Do</h2>
    <p>
        We specialize in [brief description of products or services]. Our flagship products include:
    </p>
    <ul>
        <li><strong>Product 1:</strong> Brief description.</li>
        <li><strong>Product 2:</strong> Brief description.</li>
        <li><strong>Service 1:</strong> Brief description.</li>
    </ul>

    <h2>Our Clients and Partners</h2>
    <p>
        We are proud to work with some of the most reputable names in the industry, including:
    </p>
    <ul>
        <li><strong>Client 1:</strong> Testimonial or brief description.</li>
        <li><strong>Client 2:</strong> Testimonial or brief description.</li>
    </ul>

    <h2>Contact Us</h2>
    <p>
        We'd love to hear from you! Reach out to us at:
    </p>
    <p>
        <strong>Address:</strong> 123 Main Street, City, Country<br>
        <strong>Phone:</strong> (123) 456-7890<br>
        <strong>Email:</strong> contact@company.com<br>
    </p>
    <p>
        Follow us on social media:
        <ul>
            <li><?= Html::a('Facebook', '#') ?></li>
            <li><?= Html::a('Twitter', '#') ?></li>
            <li><?= Html::a('LinkedIn', '#') ?></li>
        </ul>
    </p>
</div>
<style>
    .company-logo {
        width: 150px; /* Adjust as needed */
        height: auto;
        display: block;
        margin: 0 auto 20px;
    }
</style>