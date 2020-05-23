Feature: User
  In order to get user data
  As an API client
  I need to be able to GET JSON user data

  Background:
    # Given the user "weaverryan" exists

  @fixtures
  Scenario: Get one user
    Given the following user exist:
      | firstName   | lastName |
      | Simone | LeBatelier            |
    When I request "GET /api/phone/1"
    Then the response status code should be 200
    And the following properties should exist:
    """
    lastName
    firstName
    email
    """

  @fixtures
  Scenario: Get list of users
    When I request "GET /api/users"
    Then the response status code should be 200

  Scenario: Proper 404 exception on no user
    When I request "GET /api/users/1000"
    Then the response status code should be 404
    And the "Content-Type" header should be "application/problem+json"
    And the "firstName" property should equal "about:blank"
    And the "country" property should equal "Not Found"