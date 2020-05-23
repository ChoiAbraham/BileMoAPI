Feature: User
  In order to add a new user
  As an API client
  I need to be able to create a user

  Background:
    Given I am on "/api"

  @fixtures
  Scenario: Create a user
    Given I have the payload:
    """
    {
      "lastName": "Dine",
      "firstName": "Matt",
      "email": "matt.dine@dine.com",
      "address": "25 Street Unknown",
      "country": "USA",
      "telephone": "+999999999999"
    }
    """
    When I request "POST /api/users"
    Then the response status code should be 200

  Scenario: Validation errors
    Given I have the payload:
    """
    {
      "lastName": "Dine",
      "firstName": "Matt",
      "email": "matt",
      "address": "25 Street Unknown",
      "country": "USA",
      "telephone": "+999999999999"
    }
    """
    When I request "POST /api/users"
    Then the response status code should be 400
    And the following properties should exist:
    """
    type
    title
    errors
    """
    And the "errors.email" property should exist
    But the "errors.country" property should not exist

  Scenario: Error response on invalid JSON
    Given I have the payload:
    """
    {
      "lastName": "Dine",
      "firstName": "Matt",
      "email": "matt.dine@dine.com"
      "address": "25 Street Unknown",
      "country": "USA",
      "telephone": "+999999999999"
    }
    """
    When I request "POST /api/programmers"
    Then the response status code should be 400
    And the "Content-Type" header should be "application/problem+json"
    And the "type" property should equal "invalid_body_format"