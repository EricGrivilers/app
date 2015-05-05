<?php

namespace Caravane\Bundle\CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\Email as EmailConstraint;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {


        if($email=$request->request->get('email')) {
            $emailConstraint = new EmailConstraint();
            $emailConstraint->message = 'Your customized error message';

            $errors = $this->get('validator')->validateValue(
                $email,
                $emailConstraint
            );
            if(count($errors)>0) {
                return $this->render('default/index.html.twig', array('error'=>'email'));
            }
            $message = \Swift_Message::newInstance()
                ->setSubject('Contact website')
                ->setFrom($email)
                ->setTo($myVariable = $this->container->getParameter('app_webmaster_email') )
                ->setBody($this->renderView('CaravaneCmsBundle:Contact:email.txt.twig', array(
                    'name' => $request->request->get('name'),
                    'email' => $request->request->get('email'),
                    'phone' => $request->request->get('phone'),
                    'message' => $request->request->get('message')
                )))
            ;
            $this->get('mailer')->send($message);
            return $this->render('default/index.html.twig', array('sent'=>true));
        }
        return $this->render('CaravaneCmsBundle:Default:index.html.twig', array());
    }
}
