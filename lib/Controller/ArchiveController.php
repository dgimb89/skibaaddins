<?php
 namespace OCA\SkibaAddins\Controller;

 use Exception;

 use OCP\IRequest;
 use OCP\AppFramework\Http;
 use OCP\AppFramework\Http\DataResponse;
 use OCP\AppFramework\Controller;

 use OCA\SkibaAddins\Db\ArchiveInfo;
 use OCA\SkibaAddins\Db\ArchiveMapper;

 class ArchiveController extends Controller {

     private $mapper;
     private $userId;

     public function __construct($AppName, IRequest $request, ArchiveMapper $mapper){
         parent::__construct($AppName, $request);
         $this->mapper = $mapper;
     }

    /**
    * @NoAdminRequired
    */
     public function index() {
         return new DataResponse($this->mapper->findAll());
     }

    /**
    * @NoAdminRequired
    *
    * @param int $fileid
    * @param boolean $archived
    */
     public function create($fileid, $archived) {
         $archiveInfo = new ArchiveInfo();
         $archiveInfo->setFileid($fileid);
         $archiveInfo->setArchived($archived);
         return new DataResponse($this->mapper->insert($archiveInfo));
     }

    /**
    * @NoAdminRequired
    *
    * @param int $fileid
    */
     public function destroy($fileid) {
         try {
             $archiveInfo = $this->mapper->findByFileId($fileid);
         } catch(Exception $e) {
             return new DataResponse([], Http::STATUS_NOT_FOUND);
         }
         $this->mapper->delete($archiveInfo);
         return new DataResponse($archiveInfo);
     }

 }