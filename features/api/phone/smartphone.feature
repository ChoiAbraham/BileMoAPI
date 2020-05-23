Feature: Smartphone
  In order to get smartphones data
  As an API client
  I need to be able to GET JSON user data

  Background:
    # Given the phone "samsung" exists

  @fixtures
  Scenario: Get one smartphone
    Given the following smartphone exist:
      | title   | rate |
      | Samsung Galaxy A80 | 8/10            |
    When I request "GET /api/phone/1"
    Then the response status code should be 200
    And the following properties should exist:
    """
    title
    content
    rate
    provider
    specification
    """

  @fixtures
  Scenario: GET a collection of smartphones
    Given the following smartphones exist:
      | title    | rate |
      | Samsung Galaxy A80  | 8/10            |
      | Xiaomi Mi 9 | 9/10            |
    When I request "GET /api/phones"
    Then the response status code should be 200
    And the "phones" property should be an array
    And the "phones" property should contain 60 items