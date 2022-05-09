var classes = [
    {
        "name": "App\\Card\\Blackjack",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "drawCardToPlayer",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "drawCardToDealer",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "drawStandDealer",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "returnScore",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "returnScoreAce",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getOneScore",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "checkBust",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "checkWinner",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 9,
        "nbMethods": 9,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 9,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 22,
        "ccn": 14,
        "ccnMethodMax": 5,
        "externals": [
            "App\\Card\\Deck"
        ],
        "parents": [
            "App\\Card\\Deck"
        ],
        "implements": [],
        "lcom": 3,
        "length": 175,
        "vocabulary": 36,
        "volume": 904.74,
        "difficulty": 26.18,
        "effort": 23686.01,
        "level": 0.04,
        "bugs": 0.3,
        "time": 1316,
        "intelligentContent": 34.56,
        "number_operators": 56,
        "number_operands": 119,
        "number_operators_unique": 11,
        "number_operands_unique": 25,
        "cloc": 75,
        "loc": 173,
        "lloc": 98,
        "mi": 76.59,
        "mIwoC": 33.98,
        "commentWeight": 42.61,
        "kanDefect": 1.17,
        "relativeStructuralComplexity": 25,
        "relativeDataComplexity": 2.5,
        "relativeSystemComplexity": 27.5,
        "totalStructuralComplexity": 225,
        "totalDataComplexity": 22.5,
        "totalSystemComplexity": 247.5,
        "package": "App\\Card\\",
        "pageRank": 0.04,
        "afferentCoupling": 1,
        "efferentCoupling": 1,
        "instability": 0.5,
        "numberOfUnitTests": 9,
        "violations": {}
    },
    {
        "name": "App\\Card\\Cards",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_value",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get_suite",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 3,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 2,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [],
        "parents": [],
        "implements": [],
        "lcom": 1,
        "length": 12,
        "vocabulary": 5,
        "volume": 27.86,
        "difficulty": 2.67,
        "effort": 74.3,
        "level": 0.38,
        "bugs": 0.01,
        "time": 4,
        "intelligentContent": 10.45,
        "number_operators": 4,
        "number_operands": 8,
        "number_operators_unique": 2,
        "number_operands_unique": 3,
        "cloc": 24,
        "loc": 43,
        "lloc": 19,
        "mi": 107.64,
        "mIwoC": 61.85,
        "commentWeight": 45.79,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 2.67,
        "relativeSystemComplexity": 2.67,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 8,
        "totalSystemComplexity": 8,
        "package": "App\\Card\\",
        "pageRank": 0.42,
        "afferentCoupling": 2,
        "efferentCoupling": 0,
        "instability": 0,
        "numberOfUnitTests": 1,
        "violations": {}
    },
    {
        "name": "App\\Card\\Deck",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "show_deck",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "shuffle_deck",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "draw",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 4,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 1,
        "nbMethodsSetters": 0,
        "wmc": 8,
        "ccn": 6,
        "ccnMethodMax": 4,
        "externals": [
            "App\\Card\\Cards"
        ],
        "parents": [],
        "implements": [],
        "lcom": 1,
        "length": 68,
        "vocabulary": 32,
        "volume": 340,
        "difficulty": 7.42,
        "effort": 2522.8,
        "level": 0.13,
        "bugs": 0.11,
        "time": 140,
        "intelligentContent": 45.82,
        "number_operators": 15,
        "number_operands": 53,
        "number_operators_unique": 7,
        "number_operands_unique": 25,
        "cloc": 28,
        "loc": 67,
        "lloc": 39,
        "mi": 88.87,
        "mIwoC": 46.76,
        "commentWeight": 42.11,
        "kanDefect": 0.68,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 3.25,
        "relativeSystemComplexity": 3.25,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 13,
        "totalSystemComplexity": 13,
        "package": "App\\Card\\",
        "pageRank": 0.17,
        "afferentCoupling": 4,
        "efferentCoupling": 1,
        "instability": 0.2,
        "numberOfUnitTests": 3,
        "violations": {}
    },
    {
        "name": "App\\Card\\DeckWith2Jokers",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "add2Joker",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 3,
        "ccn": 2,
        "ccnMethodMax": 2,
        "externals": [
            "App\\Card\\Deck",
            "App\\Card\\Cards"
        ],
        "parents": [
            "App\\Card\\Deck"
        ],
        "implements": [],
        "lcom": 2,
        "length": 18,
        "vocabulary": 11,
        "volume": 62.27,
        "difficulty": 3.43,
        "effort": 213.5,
        "level": 0.29,
        "bugs": 0.02,
        "time": 12,
        "intelligentContent": 18.16,
        "number_operators": 6,
        "number_operands": 12,
        "number_operators_unique": 4,
        "number_operands_unique": 7,
        "cloc": 17,
        "loc": 34,
        "lloc": 17,
        "mi": 104.78,
        "mIwoC": 60.33,
        "commentWeight": 44.46,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 0.5,
        "relativeSystemComplexity": 1.5,
        "totalStructuralComplexity": 2,
        "totalDataComplexity": 1,
        "totalSystemComplexity": 3,
        "package": "App\\Card\\",
        "pageRank": 0.03,
        "afferentCoupling": 1,
        "efferentCoupling": 2,
        "instability": 0.67,
        "numberOfUnitTests": 0,
        "violations": {}
    },
    {
        "name": "App\\Controller\\BibliotekController",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "index",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "home",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "create",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "createProcess",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "readOne",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "readAll",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "update",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "updateProcess",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "delete",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 9,
        "nbMethods": 9,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 9,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 11,
        "ccn": 3,
        "ccnMethodMax": 2,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\Routing\\Annotation\\Route",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\Routing\\Annotation\\Route",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Doctrine\\Persistence\\ManagerRegistry",
            "App\\Entity\\Bibliotek",
            "Symfony\\Component\\Routing\\Annotation\\Route",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Doctrine\\Persistence\\ManagerRegistry",
            "Symfony\\Component\\Routing\\Annotation\\Route",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Repository\\BibliotekRepository",
            "Symfony\\Component\\Routing\\Annotation\\Route",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Doctrine\\Persistence\\ManagerRegistry",
            "Symfony\\Component\\Routing\\Annotation\\Route",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Doctrine\\Persistence\\ManagerRegistry",
            "Symfony\\Component\\Routing\\Annotation\\Route",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Doctrine\\Persistence\\ManagerRegistry",
            "Symfony\\Component\\Routing\\Annotation\\Route"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController"
        ],
        "implements": [],
        "lcom": 1,
        "length": 137,
        "vocabulary": 30,
        "volume": 672.24,
        "difficulty": 8.46,
        "effort": 5688.22,
        "level": 0.12,
        "bugs": 0.22,
        "time": 316,
        "intelligentContent": 79.45,
        "number_operators": 27,
        "number_operands": 110,
        "number_operators_unique": 4,
        "number_operands_unique": 26,
        "cloc": 57,
        "loc": 130,
        "lloc": 73,
        "mi": 81.91,
        "mIwoC": 39.15,
        "commentWeight": 42.76,
        "kanDefect": 0.29,
        "relativeStructuralComplexity": 225,
        "relativeDataComplexity": 0.65,
        "relativeSystemComplexity": 225.65,
        "totalStructuralComplexity": 2025,
        "totalDataComplexity": 5.81,
        "totalSystemComplexity": 2030.81,
        "package": "App\\Controller\\",
        "pageRank": 0.03,
        "afferentCoupling": 0,
        "efferentCoupling": 7,
        "instability": 1,
        "numberOfUnitTests": 0,
        "violations": {}
    },
    {
        "name": "App\\Controller\\CardControllerTwig",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "card",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "deck",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "draw",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "drawSelected",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "shuffle",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "deal",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "deck2",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 7,
        "nbMethods": 7,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 7,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 14,
        "ccn": 8,
        "ccnMethodMax": 3,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\Routing\\Annotation\\Route",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Card\\Deck",
            "Symfony\\Component\\Routing\\Annotation\\Route",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Symfony\\Component\\HttpFoundation\\Session\\SessionInterface",
            "App\\Card\\Deck",
            "Symfony\\Component\\Routing\\Annotation\\Route",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Symfony\\Component\\HttpFoundation\\Session\\SessionInterface",
            "App\\Card\\Deck",
            "Symfony\\Component\\Routing\\Annotation\\Route",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Symfony\\Component\\HttpFoundation\\Session\\SessionInterface",
            "App\\Card\\Deck",
            "Symfony\\Component\\Routing\\Annotation\\Route",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Symfony\\Component\\HttpFoundation\\Session\\SessionInterface",
            "App\\Card\\Deck",
            "Symfony\\Component\\Routing\\Annotation\\Route",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Card\\DeckWith2Jokers",
            "Symfony\\Component\\Routing\\Annotation\\Route"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController"
        ],
        "implements": [],
        "lcom": 1,
        "length": 190,
        "vocabulary": 33,
        "volume": 958.43,
        "difficulty": 16.22,
        "effort": 15547.94,
        "level": 0.06,
        "bugs": 0.32,
        "time": 864,
        "intelligentContent": 59.08,
        "number_operators": 44,
        "number_operands": 146,
        "number_operators_unique": 6,
        "number_operands_unique": 27,
        "cloc": 21,
        "loc": 92,
        "lloc": 71,
        "mi": 71.38,
        "mIwoC": 37.66,
        "commentWeight": 33.72,
        "kanDefect": 0.29,
        "relativeStructuralComplexity": 64,
        "relativeDataComplexity": 1.17,
        "relativeSystemComplexity": 65.17,
        "totalStructuralComplexity": 448,
        "totalDataComplexity": 8.22,
        "totalSystemComplexity": 456.22,
        "package": "App\\Controller\\",
        "pageRank": 0.03,
        "afferentCoupling": 0,
        "efferentCoupling": 7,
        "instability": 1,
        "numberOfUnitTests": 0,
        "violations": {}
    },
    {
        "name": "App\\Controller\\ControllerTwig",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "home",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "about",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "report",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "metrics",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 4,
        "nbMethods": 4,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 4,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\Routing\\Annotation\\Route",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\Routing\\Annotation\\Route",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\Routing\\Annotation\\Route",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\Routing\\Annotation\\Route"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController"
        ],
        "implements": [],
        "lcom": 1,
        "length": 12,
        "vocabulary": 6,
        "volume": 31.02,
        "difficulty": 0.8,
        "effort": 24.82,
        "level": 1.25,
        "bugs": 0.01,
        "time": 1,
        "intelligentContent": 38.77,
        "number_operators": 4,
        "number_operands": 8,
        "number_operators_unique": 1,
        "number_operands_unique": 5,
        "cloc": 12,
        "loc": 32,
        "lloc": 20,
        "mi": 101.67,
        "mIwoC": 61.04,
        "commentWeight": 40.63,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 2,
        "relativeSystemComplexity": 3,
        "totalStructuralComplexity": 4,
        "totalDataComplexity": 8,
        "totalSystemComplexity": 12,
        "package": "App\\Controller\\",
        "pageRank": 0.03,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "numberOfUnitTests": 0,
        "violations": {}
    },
    {
        "name": "App\\Controller\\GameControllerTwig",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "gameDoc",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "blackjackStart",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "blackjackGame",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "blackjackGamepProcess",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 4,
        "nbMethods": 4,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 16,
        "ccn": 13,
        "ccnMethodMax": 7,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\Routing\\Annotation\\Route",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\Routing\\Annotation\\Route",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Symfony\\Component\\HttpFoundation\\Session\\SessionInterface",
            "App\\Card\\Blackjack",
            "Symfony\\Component\\Routing\\Annotation\\Route",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Symfony\\Component\\HttpFoundation\\Session\\SessionInterface",
            "App\\Card\\Blackjack",
            "Symfony\\Component\\Routing\\Annotation\\Route"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController"
        ],
        "implements": [],
        "lcom": 2,
        "length": 136,
        "vocabulary": 29,
        "volume": 660.69,
        "difficulty": 8.4,
        "effort": 5549.76,
        "level": 0.12,
        "bugs": 0.22,
        "time": 308,
        "intelligentContent": 78.65,
        "number_operators": 31,
        "number_operands": 105,
        "number_operators_unique": 4,
        "number_operands_unique": 25,
        "cloc": 34,
        "loc": 85,
        "lloc": 51,
        "mi": 82.78,
        "mIwoC": 41.26,
        "commentWeight": 41.52,
        "kanDefect": 0.36,
        "relativeStructuralComplexity": 169,
        "relativeDataComplexity": 0.36,
        "relativeSystemComplexity": 169.36,
        "totalStructuralComplexity": 676,
        "totalDataComplexity": 1.43,
        "totalSystemComplexity": 677.43,
        "package": "App\\Controller\\",
        "pageRank": 0.03,
        "afferentCoupling": 0,
        "efferentCoupling": 6,
        "instability": 1,
        "numberOfUnitTests": 0,
        "violations": {}
    },
    {
        "name": "App\\Controller\\JsonCardControllerTwig",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "deckToJson",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Card\\Deck",
            "Symfony\\Component\\HttpFoundation\\JsonResponse",
            "Symfony\\Component\\Routing\\Annotation\\Route"
        ],
        "parents": [],
        "implements": [],
        "lcom": 1,
        "length": 22,
        "vocabulary": 11,
        "volume": 76.11,
        "difficulty": 3,
        "effort": 228.32,
        "level": 0.33,
        "bugs": 0.03,
        "time": 13,
        "intelligentContent": 25.37,
        "number_operators": 6,
        "number_operands": 16,
        "number_operators_unique": 3,
        "number_operands_unique": 8,
        "cloc": 3,
        "loc": 17,
        "lloc": 14,
        "mi": 91.98,
        "mIwoC": 61.69,
        "commentWeight": 30.29,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 16,
        "relativeDataComplexity": 0.2,
        "relativeSystemComplexity": 16.2,
        "totalStructuralComplexity": 16,
        "totalDataComplexity": 0.2,
        "totalSystemComplexity": 16.2,
        "package": "App\\Controller\\",
        "pageRank": 0.03,
        "afferentCoupling": 0,
        "efferentCoupling": 4,
        "instability": 1,
        "numberOfUnitTests": 0,
        "violations": {}
    },
    {
        "name": "App\\Entity\\Bibliotek",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getTitel",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setTitel",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getIsbn",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setIsbn",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getForfattare",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setForfattare",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getUrlbild",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setUrlbild",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 9,
        "nbMethods": 0,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 0,
        "nbMethodsGetter": 5,
        "nbMethodsSetters": 4,
        "wmc": 0,
        "ccn": 1,
        "ccnMethodMax": 0,
        "externals": [],
        "parents": [],
        "implements": [],
        "lcom": 0,
        "length": 42,
        "vocabulary": 10,
        "volume": 139.52,
        "difficulty": 3.63,
        "effort": 505.76,
        "level": 0.28,
        "bugs": 0.05,
        "time": 28,
        "intelligentContent": 38.49,
        "number_operators": 13,
        "number_operands": 29,
        "number_operators_unique": 2,
        "number_operands_unique": 8,
        "cloc": 8,
        "loc": 57,
        "lloc": 49,
        "mi": 75.4,
        "mIwoC": 47.98,
        "commentWeight": 27.42,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 9.44,
        "relativeSystemComplexity": 9.44,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 85,
        "totalSystemComplexity": 85,
        "package": "App\\Entity\\",
        "pageRank": 0.06,
        "afferentCoupling": 2,
        "efferentCoupling": 0,
        "instability": 0,
        "numberOfUnitTests": 0,
        "violations": {}
    },
    {
        "name": "App\\Entity\\Product",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getName",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setName",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getValue",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setValue",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 0,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 0,
        "nbMethodsGetter": 3,
        "nbMethodsSetters": 2,
        "wmc": 0,
        "ccn": 1,
        "ccnMethodMax": 0,
        "externals": [],
        "parents": [],
        "implements": [],
        "lcom": 0,
        "length": 22,
        "vocabulary": 8,
        "volume": 66,
        "difficulty": 2.5,
        "effort": 165,
        "level": 0.4,
        "bugs": 0.02,
        "time": 9,
        "intelligentContent": 26.4,
        "number_operators": 7,
        "number_operands": 15,
        "number_operators_unique": 2,
        "number_operands_unique": 6,
        "cloc": 6,
        "loc": 35,
        "lloc": 29,
        "mi": 85.14,
        "mIwoC": 55.22,
        "commentWeight": 29.92,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 5.4,
        "relativeSystemComplexity": 5.4,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 27,
        "totalSystemComplexity": 27,
        "package": "App\\Entity\\",
        "pageRank": 0.06,
        "afferentCoupling": 1,
        "efferentCoupling": 0,
        "instability": 0,
        "numberOfUnitTests": 0,
        "violations": {}
    },
    {
        "name": "App\\Kernel",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [],
        "nbMethodsIncludingGettersSetters": 0,
        "nbMethods": 0,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 0,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 0,
        "ccn": 1,
        "ccnMethodMax": 0,
        "externals": [
            "Symfony\\Component\\HttpKernel\\Kernel"
        ],
        "parents": [
            "Symfony\\Component\\HttpKernel\\Kernel"
        ],
        "implements": [],
        "lcom": 0,
        "length": 0,
        "vocabulary": 0,
        "volume": 0,
        "difficulty": 0,
        "effort": 0,
        "level": 0,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 0,
        "number_operators": 0,
        "number_operands": 0,
        "number_operators_unique": 0,
        "number_operands_unique": 0,
        "cloc": 0,
        "loc": 5,
        "lloc": 5,
        "mi": 171,
        "mIwoC": 171,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 0,
        "relativeSystemComplexity": 0,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 0,
        "totalSystemComplexity": 0,
        "package": "App\\",
        "pageRank": 0.03,
        "afferentCoupling": 0,
        "efferentCoupling": 1,
        "instability": 1,
        "numberOfUnitTests": 0,
        "violations": {}
    },
    {
        "name": "App\\Repository\\BibliotekRepository",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "add",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "remove",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 3,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 5,
        "ccn": 3,
        "ccnMethodMax": 2,
        "externals": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository",
            "Doctrine\\Persistence\\ManagerRegistry",
            "App\\Entity\\Bibliotek",
            "App\\Entity\\Bibliotek"
        ],
        "parents": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository"
        ],
        "implements": [],
        "lcom": 2,
        "length": 16,
        "vocabulary": 5,
        "volume": 37.15,
        "difficulty": 1.75,
        "effort": 65.01,
        "level": 0.57,
        "bugs": 0.01,
        "time": 4,
        "intelligentContent": 21.23,
        "number_operators": 2,
        "number_operands": 14,
        "number_operators_unique": 1,
        "number_operands_unique": 4,
        "cloc": 44,
        "loc": 65,
        "lloc": 22,
        "mi": 107.14,
        "mIwoC": 59.32,
        "commentWeight": 47.82,
        "kanDefect": 0.29,
        "relativeStructuralComplexity": 16,
        "relativeDataComplexity": 0.33,
        "relativeSystemComplexity": 16.33,
        "totalStructuralComplexity": 48,
        "totalDataComplexity": 1,
        "totalSystemComplexity": 49,
        "package": "App\\Repository\\",
        "pageRank": 0.03,
        "afferentCoupling": 1,
        "efferentCoupling": 3,
        "instability": 0.75,
        "numberOfUnitTests": 0,
        "violations": {}
    },
    {
        "name": "App\\Repository\\ProductRepository",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "add",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "remove",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 3,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 5,
        "ccn": 3,
        "ccnMethodMax": 2,
        "externals": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository",
            "Doctrine\\Persistence\\ManagerRegistry",
            "App\\Entity\\Product",
            "App\\Entity\\Product"
        ],
        "parents": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository"
        ],
        "implements": [],
        "lcom": 2,
        "length": 16,
        "vocabulary": 5,
        "volume": 37.15,
        "difficulty": 1.75,
        "effort": 65.01,
        "level": 0.57,
        "bugs": 0.01,
        "time": 4,
        "intelligentContent": 21.23,
        "number_operators": 2,
        "number_operands": 14,
        "number_operators_unique": 1,
        "number_operands_unique": 4,
        "cloc": 44,
        "loc": 65,
        "lloc": 22,
        "mi": 107.14,
        "mIwoC": 59.32,
        "commentWeight": 47.82,
        "kanDefect": 0.29,
        "relativeStructuralComplexity": 16,
        "relativeDataComplexity": 0.33,
        "relativeSystemComplexity": 16.33,
        "totalStructuralComplexity": 48,
        "totalDataComplexity": 1,
        "totalSystemComplexity": 49,
        "package": "App\\Repository\\",
        "pageRank": 0.03,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "numberOfUnitTests": 0,
        "violations": {}
    }
]