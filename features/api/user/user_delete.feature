Feature: User
  In order to delete a user
  As an API client
  I need to be able to delete a user

  Background:
    Given I am on "/api"

  @fixtures
  Scenario: DELETE a programmer
    Given the following user exist:
      | firstName   | lastName |
      | Simone | LeBatelier            |
    When I request "DELETE /api/users/1"
    Then the response status code should be 204