<?php

/**
 * Test Case class for testing UserIdentity component
 *
 * @author Danish Satkut
 */
class UserIdentityTest extends CTestCase {
    private $user;
    
    protected function setUp() {
        
    }
    
    /**
     * Test case for testing the authenticate method for success
     */
    public function testAuthenticate_ValidationSuccessful_ReturnsTrue() {
        $this->user = new UserIdentity("danish_satkut@hotmail.com", "danish786");
        $success = $this->user->authenticate();
        
        $this->assertTrue($success);
        $this->assertEquals(UserIdentity::ERROR_NONE, $this->user->errorCode);
        $this->assertEquals('Danish', $this->user->username);
    }
    
    /**
     * Test case for testing the authenticate method for invalid username
     */
    public function testAuthenticate_InvalidEmail_ReturnsFalse() {
        $this->user = new UserIdentity("invalid@email.com", "invalid");
        $unsuccessful = $this->user->authenticate();
        
        $this->assertFalse($unsuccessful);
        $this->assertEquals(UserIdentity::ERROR_USERNAME_INVALID, $this->user->errorCode);
    }
    
    /**
     * Test case for testing the authenticate method for invalid password
     */
    public function testAuthenticate_InvalidPassword_ReturnsFalse() {
        $this->user = new UserIdentity("danish_satkut@hotmail.com", "invalid");
        $unsuccessful = $this->user->authenticate();
        
        $this->assertFalse($unsuccessful);
        $this->assertEquals(UserIdentity::ERROR_PASSWORD_INVALID, $this->user->errorCode);
    }
    
    protected function tearDown() {
        unset($this->user);
    }
}

?>
