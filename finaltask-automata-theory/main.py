import token
import lexical_analysis
from push_down_automata import PushDownAutomata

case_pack_1 = {
    'case_pdf_1': "p and q or r",  # valid
    'case_pdf_2': "if p then ( not q s )",  # invalid
    'case_pdf_3': "p xor ( q and not ( p and q ) )",  # valid

    # case dhiva
    'case_1': "p",
    'case_2': "p q",
    'case_3': "p and q",
    'case_4': "or p q",
    'case_5': "then p and r",
    'case_6': "if p or t",
    'case_7': "not p then s not",
    'case_8': "not q iff not r",
    'case_9': "r xor s",
    'case_10': "p then ( q then ( r then ( s iff t ) )",
    'case_11': "p iff ( q or s )",
    'case_12': "( p xor q ) or ( p sor r ) or ( p xor s )",
    'case_13': "p xor ( q or r and s )",
    'case_14': "( ( p ifff q ) then r )",
    'case_15': "if not p then ( if q then not r )",
    'case_16': "if p nott q then ss",

    # add your new case here


}

# PDA test CASE
case_pack_2 = {
    'case_pda_1': "p",  # valid
    'case_pda_2': 'not not not not ( p and q )',  # valid
    'case_pda_3': 'p and p or p and ( p or p )',  # valid
    'case_pda_4': 'not p not r',  # invalid
    'case_pda_5': 'if p then q',  # valid
    'case_pda_6': 'if ( p and q ) then ( q and r )',  # valid
    'case_pda_7': 'p and q and ( q or ( q ) )'  # valid

    # add your new case here

}

if __name__ == '__main__':


    # Test Case Pack 1
    for case_name, logic in sorted(case_pack_1.iteritems()):

        print 'case :', case_name
        print 'logic :', logic
        pda = PushDownAutomata()
        token_preposition = lexical_analysis.get_token(logic)
        print 'result :', pda.evaluate(token_preposition, debug=False, verbose=False), '\n'

    # Test Case Pack 2
    for case_name, logic in sorted(case_pack_2.iteritems()):

        print 'case :', case_name
        print 'logic :', logic
        pda = PushDownAutomata()
        token_preposition = lexical_analysis.get_token(logic)
        print 'result :', pda.evaluate(token_preposition, debug=False, verbose=False), '\n'
